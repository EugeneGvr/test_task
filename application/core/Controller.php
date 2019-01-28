<?php

namespace application\core;

use application\core\View;

	abstract class Controller
	{
		protected $view;		// Экземпляр представления
		protected $model;		// Экземпляр модели
		
		function __construct($route)
		{
			$this->view = new View($route); 						// создание экземпляра представления
			$this->model = $this->loadModel($route['controller']);	// создание экземпляра модели
			
		}

		private  function loadModel($name)							// МЕТОД для создания экземпляра модели
		{
			$path ='application\models\\'.ucfirst($name);			// пусть к модели
			if(class_exists($path)) {
				return new $path;
			}
		}
	}