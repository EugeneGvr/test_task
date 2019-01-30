<?php

namespace application\models;

use application\core\Model;

	class Film extends Model {

		public function getFilm($film_id) 											// МЕТОД для получение "детальной" информации о фильме
		{
			$film_query = "SELECT `id`, `name`, `year`, `format` FROM `Films` WHERE `id`=:id";	// запрос для таблицы Films
			$film_params = [
				'id' => $film_id,
			];																					// параметры запроса
			$film_result = $this->db->queryAction($film_query, $film_params);					//выполнение запросов
			//
			$middle_result = $this->db->queryAction("SELECT `actor_id` FROM `FilmActorConnection` WHERE `film_id`=:id", $film_params);
			$actors_result = [];
			foreach ($middle_result as $value) {
				$actors_query = "SELECT `name`, `surname` FROM `Actors` WHERE `id`=:id";		// запрос для таблицы Actors
				$actors_params = [
					'id' => $value['actor_id'],
				];
				$res = $this->db->queryAction($actors_query, $actors_params);
				array_push($actors_result, array_shift($res));
			}
			$data = [
				'film' => $film_result,
				'actors' => $actors_result,
				/*массивы хранятся и передаются отдельно что бы на фронте проще было их парсить*/
			];						//результат выполнения запроса
			return $data;
		}
	}