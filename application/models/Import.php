<?php

namespace application\models;

use application\core\Model;

	class Import extends Model {
		
		public function Import($file)				// МЕТОД для импорта фильмов с текстового файла
		{	
			$file_content = file_get_contents($file);										// достаем контент с файла (в строку)
			$film_array = preg_split("/Title: |Year: |Format: |Stars: /", $file_content);	// получаем массив данных для записи в БД
			$arr_len = count($film_array);			// длина массива для проверки корректности данных
			if(($arr_len-1)%4==0)					// если данные не кратны 4, данные неполные / некоректные 
			{
				for($i=1;$i<$arr_len;$i+=4)
				{
					if($this->CheckFilm($film_array[$i], $film_array[$i+1], $film_array[$i+2]))		/*проверка есть ли такой фильм в таблице (не считая актеров) */
					{
						$id=array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Films`")))+1;	//узнаем макс. id и берем след.
						$film_query = "INSERT INTO `Films`(`id`, `name`, `year`, `format`) VALUES (:id,:name,:year,:format)";	// запрос
						$film_params = [
								'id'=> $id,
								'name' => $film_array[$i],
								'year' => $film_array[$i+1],
								'format' => $film_array[$i+2],
							];															// параметры
						$this->db->no_answer_queryAction($film_query,$film_params); 	//выполнение запроса -> ВСТАВИТЬ ФИЛЬМ в таблицу
						$actors = split(', ', $film_array[$i+3]);						// имена актеров со строки в массив
						foreach ($actors as $value) {
							$actors_query = "INSERT INTO `Actors`(`film_id`, `Name`, `Surname`) VALUES (:id,:name,:surname)";	// запрос
							$actors_params = [
								'id'=> $id,
								'name' => preg_split('/ +/',$value)[0],
								'surname' => preg_split('/ +/',$value)[1],
							];																	//параметры
							$this->db->no_answer_queryAction($actors_query,$actors_params);		//выполнение запроса -> ВСТАВИТЬ АКТЕРА в таблицу
						}
					}
				}
			}
		}

		public function CheckFilm($film_name, $film_year, $film_format)					// МЕТОД для проверки фильма на наличие в таблице
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