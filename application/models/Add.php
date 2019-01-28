<?php

namespace application\models;

use application\core\Model;

	class Add extends Model {

		public function addFilm($name,$year,$format,$actors)					// МЕТОД для добавление фильма
		{
			$id=array_shift(array_shift($this->db->queryAction("SELECT MAX(`id`) FROM `Films`")))+1;	//находим максимальный id и берем след.
			$add_query="INSERT INTO `Films`(`id`, `name`, `year`, `format`) VALUES (:id,:name,:year,:format)";	// запрос
			$add_params = [
				'id' =>$id,
				'name' => $name,
				'year' => $year,
				'format' => $format,
			];																// параметры запроса
			$this->db->no_answer_queryAction($add_query,$add_params);		// выполнение запроса -> "ВСТАВКА" фильма в таблицу
			$actors_arr = split(', ', $actors);								//делим строку на /имя фамилия/ каждого актера
			foreach ($actors_arr as $value) {
				$actors_query = "INSERT INTO `Actors` (`film_id`, `Name`, `Surname`) VALUES (:id,:name,:surname)";	// запрос
				$actors_params = [
					'id'=> $id,
					'name' => preg_split('/ +/',$value)[0],
					'surname' => preg_split('/ +/',$value)[1],
					/*вместо split() был взят preg_split() что бы избежать влияния человеческой ошибки в заполнении файла на парсинг
					(функция делит не по одному пробелу)*/
				];																	//параметры
				$this->db->no_answer_queryAction($actors_query,$actors_params);		// выполнение запроса -> "ВСТАВКА" актеров в таблицу
			}	
		}
	}