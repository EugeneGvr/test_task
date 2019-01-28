<?php

namespace application\controllers;

use application\core\Controller;

	class AddController extends Controller
	{
		
		public function addAction() 							// ДЕЙСТВИЕ представления add.php
		{
			$this->view->render('Add film');						// рендерим представление с Title: Add Film

			if ( isset( $_POST['add'] ) ) 							// ждем нажатия кнопки Add
			{
				if(isset($_POST['name']) && isset($_POST['year'])  && isset($_POST['format'])  && isset($_POST['actors']))
				{
					$this->model->addFilm($_POST['name'], $_POST['year'], $_POST['format'], $_POST['actors']);	// вызов фунцкции модели addFilm
					$this->view->redirect("/");																// перенаправление на главную (/)
				}
			}

			if ( isset( $_POST['back'] ) ) 							// ждем нажатия кнопки Back
			{
				$this->view->redirect("/");								// перенаправление на главную (/)
			}
		}
	}