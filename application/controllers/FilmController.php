<?php

namespace application\controllers;
use application\core\Controller;

	class FilmController extends Controller
	{
		
		public function showAction($film_id)			// ДЕЙСТВИЕ представления show.php
		{
			$data = $this->model->getFilm($film_id);				// получаем данные про фильм
			$vars = [
				'film_info' => array_shift($data['film']),
				'actors_info' => $data['actors'],
			];														// параметры для представления
			$this->view->render($film_info['name'],$vars);			// рендерим представление с Title: film name

			if ( isset( $_POST['back'] ) )							// ждем нажатия кнопки Back
			{
				$this->view->redirect("/");							// перенаправление на главную (/)
			}
		}

	}