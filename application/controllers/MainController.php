<?php

namespace application\controllers;

use application\core\Controller;

	class MainController extends Controller
	{
		
		public function indexAction() 										// ДЕЙСТВИЕ страницы index.php
		{
			if ( !isset( $_POST['sort'] ) && !isset( $_POST['name_search'] ) && !isset( $_POST['actor_search'] ) )
			{
				$result=$this->model->getFilms(); 									// получение всех фиьмов
				$params = [
					'films' => $result,
				];																	// параметры для передачи в представление
				$this->view->render('Main page',$params);							// рендерим представление с Title: Main page
			}

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
				$sorted_params = [ 'films' => $sorted_result, ];
				$this->view->render('Main page',$sorted_params);					// рендерим представление с Title: Main page
			}

			if ( isset( $_POST['import'] ) )										// ждем нажатия кнопки Import
			{
				$this->view->redirect("/import");									// перенаправление на главную (/)
			}

			if ( isset( $_POST['name_search'] ) )													// ждем нажатия кнопки Search
			{
				$name_search_result=$this->model->nameSearch($_POST['name_search_value']);
				$name_search_params = [ 'films' => $name_search_result, ];
				$this->view->render('Main page',$name_search_params);
			}

			if ( isset( $_POST['actor_search'] ) )													// ждем нажатия кнопки Search
			{
				$actor_search_result=$this->model->actorSearch($_POST['actor_search_value']);		
				$actor_search_params = [ 'films' => $actor_search_result, ];
				$this->view->render('Main page',$actor_search_params);
			}
		} 
	}