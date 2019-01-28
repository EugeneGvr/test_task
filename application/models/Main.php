<?php

namespace application\models;

use application\core\Model;

	class Main extends Model {
		
		public function getFilms()								// МЕТОД для получение всех фильмов
		{
			return $this->db->queryAction("SELECT `id`,`name` FROM `Films`");	// выполняем запрос -> ПОЛУЧЕНИЕ ВСЕХ ФИЛЬМОВ
		}

		public function Delete($film_id)						// МЕТОД для удаления фильма
		{
			$params = [
				'film_id' => $film_id,
			];																								// параметры запроса
			$this->db->no_answer_queryAction("DELETE FROM `Films` WHERE `id`=:film_id", $params);			// выполняем запрос -> УДАЛЕНИЕ ФИЛЬМА
			$this->db->no_answer_queryAction("DELETE FROM `Actors` WHERE `film_id`=:film_id", $params);		// выполняем запрос -> УДАЛЕНИЕ АКТЕРОВ
		}

		public function Sort()									// МЕТОД для сортировки фильмов по названию
		{
			$result = $this->db->queryAction("SELECT `id`,`name` FROM `Films` ORDER BY `name`");
			return $result;
		}

		public function nameSearch($search_value)				// МЕТОД для поиска фильма по НАЗВАНИЮ
		{
			$query="SELECT `id`,`name` FROM `Films` WHERE `name` LIKE :search_value";	//запрос
			$params = [
				'search_value' => '%'.$search_value.'%',
			];																			// параметры запроса
			$result = $this->db->queryAction($query,$params);							// выполнение запроса
			return $result;
		}

		public function actorSearch($search_value)				// МЕТОД для поиска фильма по ИМЕНИ АКТЕРА
		{
			$query="SELECT `film_id` FROM `Actors` WHERE `name` LIKE :search_value or `surname` LIKE :search_value";	//запрос
			$params = [
				'search_value' => '%'.$search_value.'%',
			];																				//параметры запроса
			$id_arr = $this->db->queryAction($query,$params);								// выполнение запроса
			$result=[];																		//массив фильмов с нужными актерами
			foreach ($id_arr as $value) {
				$file_name = $this->db->queryAction("SELECT `id`, `name` FROM `Films` WHERE `id`=:id",['id'=> $value['film_id'],]);	
				array_push($result, array_shift($file_name));								//пушим елемент в массив
			}
			return $result;
		}
	}