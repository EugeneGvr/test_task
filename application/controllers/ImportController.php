<?php

namespace application\controllers;

use application\core\Controller;

	class ImportController extends Controller
	{
		
		public function importAction()				// ДЕЙСТВИЕ страницы import.php
		{
			$this->view->render('Import page');				// рендерим представление с Title: Import page

			if ( isset( $_POST['import'] ) )				// ждем нажатия кнопки Import
			{
				if(isset($_FILES["import_file"]["tmp_name"])) {
					$this->model->Import($_FILES["import_file"]["tmp_name"]);	// вызов фунцкции модели Import
					$this->view->redirect("/");									// перенаправление на главную (/)
				}
			}

			if ( isset( $_POST['back'] ) )									// ждем нажатия кнопки Back
			{
				$this->view->redirect("/");										// перенаправление на главную (/)
			}

		} 
	}