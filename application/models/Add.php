<?php

namespace application\models;

use application\core\Model;

	class Add extends Model {

		public function addFilm($name,$year,$format,$actors)					// МЕТОД для добавление фильма
		{
			if($this->CheckFilm($name, $year, $format))		/*проверка есть ли такой фильм в таблице (не считая актеров) */
			{
				$film_id=array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Films`")))+1;	//находим максимальный id и берем след.
				$add_query="INSERT INTO `Films`(`id`, `name`, `year`, `format`) VALUES (:id,:name,:year,:format)";	// запрос
				$add_params = [
					'id' =>$film_id,
					'name' => strip_tags($name),
					'year' => strip_tags($year),
					'format' => strip_tags($format),
				];																// параметры запроса
				$this->db->no_answer_queryAction($add_query,$add_params);		// выполнение запроса -> "ВСТАВКА" фильма в таблицу
					//==========================================================================//
				$actors_arr = split(', ', $actors);								// делим строку на /имя фамилия/ каждого актера
				foreach ($actors_arr as $value)									// проверка на колличество слов в имени
				{
					$store_arr=preg_split('/ +/',$value);
					$len=count($store_arr);
					if ($len == 1)												// если одно слово, записиваем в имя
					{
	    				$name = $store_arr[0];
	    				$surname= "";
					} elseif ($len == 2)										// если два слова, записиваем в имя и фамилию
					{
	    				$name = $store_arr[0];
	    				$surname= $store_arr[1];
					} else 														// если больше, записиваем все в имя кроме посл. слова
					{
	    				$name = "";
	    				for ($i=0; $i < ($len-1); $i++) { 
	    					$name =$name." ".$store_arr[$i];
	    				}
	    				$surname= $store_arr[$len-1];
					}
					$res = $this->CheckName($name, $surname);
					if($res=="not_found"){
						$actor_id = array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Actors`")))+1;
						$actors_query = "INSERT INTO `Actors` (`id`, `Name`, `Surname`) VALUES (:id,:name,:surname)";	// запрос
						$actors_params = [
							'id'=> $actor_id,
							'name' => $name,
							'surname' => $surname,
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
					$this->db->no_answer_queryAction($conn_query, $conn_params);// выполнение запроса -> "ВСТАВКА" id фильма и актера в таблицу
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