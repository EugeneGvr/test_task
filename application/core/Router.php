<?php

namespace application\core;

	class  Router
	{
		protected $routes = [];		// массив содержащий пути проекта
		protected $params = [];		// массив содержащий нужные названия контроллера и действия

		function __construct() {
			$arr = require 'application/config/routes.php';
			foreach ($arr as $key => $val)						// создание массива содержащий пути проекта
			{
				if ($key=='films') {
					$this->routes['#^'.$key.'/\d*$#']=$val;		// создаем регулярку для страниц фильмов
				}
				else {
					$this->routes['#^'.$key.'$#']=$val;			// создаем регулярку
				}
			}
		}


		public function run()				// МЕТОД запуск нужного контроллера и нужного действия 
		{
			if($this->match()){
				$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
				if(class_exists($path)) 							// если существует класс (контроллер)
				{
					$action = $this->params['action'].'Action';
					if(method_exists($path, $action))				// если существует метод (действие)
					{
						$controller = new $path($this->params);		// создание экземпляра контроллера
						if($this->params['action']=='show') {
							$controller->$action(array_pop(explode("/", $_SERVER['REQUEST_URI'])));		// вызов действия
						}
						else {
							$controller->$action();														// вызов действия
						}
					}
					else {
						View::errorCode(404);
					}
				}
				else {
					View::errorCode(404);
				}
			}
			else {
				View::errorCode(404);
			}
		}

		public function match()				// МЕТОД для проверки маршрутов проекта и заполнения массива параметров
		{
			foreach ($this->routes as $route => $params) {
				if(preg_match($route, trim($_SERVER['REQUEST_URI'],'/'), $matches)) // при условии совпадения регулярки и url выбираем нужное действие и контроллер
				{
					$this->params = $params;
					return true;
				}
			}
			return false;
		}
	}