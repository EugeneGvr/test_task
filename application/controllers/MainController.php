<?php

namespace application\controllers;

use application\core\Controller;

	class MainController extends Controller
	{
		protected $params;

		public function indexAction() 										// ДЕЙСТВИЕ страницы index.php
		{
			$result=$this->model->getFilms(); 									// получение всех фильмов
			$this->params = [
				'films' => $result,
			];																	// параметры для передачи в представление

			foreach ($result as $key => $val) {
				if ( isset( $_POST["open_".$val['id']] ) )							// ждем нажатия кнопки Open
				{

					$this->view->redirect("/films/".$val['id']);					// перенаправляем на личную страницу конкретной карты
				}
			}

			foreach ($result as $key => $val) {
				if ( isset( $_POST["delete_".$val['id']] ) )						// ждем нажатия кнопки Delete
				{
					$this->model->Delete($val['id']);								// вызов фунцкции модели Delete
					$this->view->redirect("/");										// перенаправление на главную (/)
				}
			}

			if ( isset( $_POST['add'] ) )											// ждем нажатия кнопки Add
			{
				$this->view->redirect("/add");										// перенаправление на главную (/)
			}

			if ( isset( $_POST['sort'] ) )											// ждем нажатия кнопки Sort
			{
				$sorted_result=$this->model->Sort();								// получаем отсортированные данные
				$this->params = [ 'films' => $sorted_result, ];
			}

			if ( isset( $_POST['import'] ) )										// ждем нажатия кнопки Import
			{
				$this->view->redirect("/import");									// перенаправление на главную (/)
			}

			if ( isset( $_POST['name_search'] ) )													// ждем нажатия кнопки Search
			{
				$name_search_result=$this->model->nameSearch($_POST['name_search_value']);
				$this->params = [ 'films' => $name_search_result, ];
			}

			if ( isset( $_POST['actor_search'] ) )													// ждем нажатия кнопки Search
			{
				$actor_search_result=$this->model->actorSearch($_POST['actor_search_value']);		
				$this->params = [ 'films' => $actor_search_result, ];
			}
			$this->view->render('Main page',$this->params);								// рендерим представление с Title: Main page
		} 
	}