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
			$result = $this->db->queryAction("SELECT `actor_id` FROM `FilmActorConnection` WHERE `film_id`=:film_id", $params);
			$this->db->no_answer_queryAction("DELETE FROM `FilmActorConnection` WHERE `film_id`=:film_id", $params);
			foreach ($result as $value) {
				$this->db->no_answer_queryAction("DELETE FROM `Actors` WHERE `id`=:id", ['id' => $value['actor_id'],]);
			}
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
			$actors_query="SELECT `id` FROM `Actors` WHERE `name` LIKE :search_value or `surname` LIKE :search_value";	//запрос
			$actors_params = [
				'search_value' => '%'.$search_value.'%',
			];																						//параметры запроса
			$actors_result = $this->db->queryAction($actors_query,$actors_params);					// выполнение запроса
			$film_result=[];																		//массив фильмов с нужными актерами
			$result=[];
			foreach ($actors_result as $value) {
				$film_id = $this->db->queryAction("SELECT `film_id` FROM `FilmActorConnection` WHERE `actor_id`=:id",['id'=> $value['id'],]);	
				array_push($film_result, array_shift($film_id));								//пушим елемент в массив
			}
			foreach ($film_result as $value) {
				$film_name = $this->db->queryAction("SELECT `id`, `name` FROM `Films` WHERE `id`=:id",['id'=> $value['film_id'],]);	
				array_push($result, array_shift($film_name));									//пушим елемент в массив
			}
			return $result;
		}
	}