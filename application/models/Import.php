<?php

namespace application\models;

use application\core\Model;

	class Import extends Model {
		
		public function Import($file)				// МЕТОД для импорта фильмов с текстового файла
		{	
			$file_content = file_get_contents($file);
			echo "!!!".$file_content."ffff";		// достаем контент с файла (в строку)
			$film_array = split("\n", trim($file_content));		// получаем массив данных для записи в БД
			$arr_len = count($film_array);		// длина массива для проверки корректности данных
			for($i=0;$i<$arr_len;$i+=5)
			{
					if(split(": ",$film_array[$i])[0]="Title"){$name=trim(substr($film_array[$i], 7));}
					if(split(": ",$film_array[$i+1])[0]="Year"){$year=trim(substr($film_array[$i+1], 14));}
					if(split(": ",$film_array[$i+2])[0]="Format"){$format=trim(substr($film_array[$i+2], 8));}
					if(split(": ",$film_array[$i+3])[0]="Stars"){$stars=trim(substr($film_array[$i+3], 7));}

					if($this->CheckFilm($name, $year, $format))		/*проверка есть ли такой фильм в таблице (не считая актеров) */
					{
						$film_id=array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Films`")))+1;//узнаем макс. id и берем след.
						$film_query = "INSERT INTO `Films`(`id`, `name`, `year`, `format`) VALUES (:id,:name,:year,:format)";	// запрос
						$film_params = [
								'id'=> $film_id,
								'name' => $name,
								'year' => $year,
								'format' => $format,
							];															// параметры
						$this->db->no_answer_queryAction($film_query,$film_params);	//выполнение запроса -> ВСТАВИТЬ ФИЛЬМ в таблицу
						$actors = split(', ', $stars);									// имена актеров со строки в массив
						foreach ($actors as $value) {

							$store_arr=preg_split('/ +/',trim($value));
							$len=count($store_arr);
							if ($len == 1)												// если одно слово, записиваем в имя
							{
			    				$actor_name = $store_arr[0];
			    				$actor_surname= "";
							} elseif ($len == 2)										// если два слова, записиваем в имя и фамилию
							{
			    				$actor_name = $store_arr[0];
			    				$actor_surname= $store_arr[1];
							} else 														// если больше, записиваем все в имя кроме посл. слова
							{
			    				$actor_name = "";
			    				for ($j=0; $j <$len-1; $j++) { 
			    					$actor_name =$actor_name." ".$store_arr[$j];
			    				}
			    				$actor_surname= $store_arr[$len-1];
							}
							$res = $this->CheckName($actor_name, $actor_surname);
							if($res=="not_found"){
								$actor_id = array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Actors`")))+1;
								$actors_query = "INSERT INTO `Actors` (`id`, `Name`, `Surname`) VALUES (:id,:name,:surname)";	// запрос
								$actors_params = [
									'id'=> $actor_id,
									'name' => $actor_name,
									'surname' => $actor_surname,
									/*вместо split() был взят preg_split() что бы избежать влияния человеческой ошибки в заполнении файла на парсинг
									(функция делит не по одному пробелу)*/
								];																//параметры
								$this->db->no_answer_queryAction($actors_query,$actors_params);	// выполнение запроса -> "ВСТАВКА" актеров в таблицу
							}
							else
							{
								$actor_id = $res;
							}
			
							$conn_query = "INSERT INTO `FilmActorConnection`(`film_id`, `actor_id`) VALUES (:film_id,:actor_id)";
							$conn_params = [
								'film_id'=> $film_id,
								'actor_id' => $actor_id,

							];
							$this->db->no_answer_queryAction($conn_query, $conn_params);// выполнение запроса
						}
					}
				}
		}


		private function CheckName($name, $surname)
		{
			$query = "Select `id`, `name`, `surname` FROM `Actors`";
			$result = $this->db->queryAction($query);
			foreach ($result as $value) {
				if($name == $value['name'] || $surname == $value['surname'])
				{
					return $value['id'];
				}
			}
			return 'not_found';
		}

		private function CheckFilm($film_name, $film_year, $film_format)					// МЕТОД для проверки фильма на наличие в таблице
		{
			$result = $this->db->queryAction("SELECT `name`, `year`, `format` FROM `Films`");	//выполнение запроса -> ВЫБРАТЬ ВСЕ ФИЛЬМЫ с таблицы
			foreach ($result as $value) {
				if(trim($value['name']) == trim($film_name) && trim($value['year']) == trim($film_year) && trim($value['format']) == trim($film_format)) {
					/*в случае нахождения идентичного фильма -> возвращение false*/
					return false;
				}
			}
			/*в ином случае  -> возвращение true*/
			return true;

		}
	}