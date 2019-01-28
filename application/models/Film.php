<?php

namespace application\models;

use application\core\Model;

	class Film extends Model {

		public function getFilm($film_id) 											// МЕТОД для получение "детальной" информации о фильме
		{
			$film_query = "SELECT `id`, `name`, `year`, `format` FROM `Films` WHERE `id`=:id";	// запрос для таблицы Films
			$actors_query = "SELECT `name`, `surname` FROM `Actors` WHERE `film_id`=:id";		// запрос для таблицы Actors
			$params = [
				'id' => $film_id,
			];																					// параметры запроса
			$film_result = $this->db->queryAction($film_query, $params);						//выполнение запросов
			$actors_result = $this->db->queryAction($actors_query, $params);					//
			$data = [
				'film' => $film_result,
				'actors' => $actors_result,
				/*массивы хранятся и передаются отдельно что бы на фронте проще было их парсить*/
			];						//результат выполнения запроса
			return $data;
		}
	}