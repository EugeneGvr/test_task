<?php
/*
	возврат массива с маршрутами проекта
		key - маршрут
		value - массив имеющий данные о маршруте:
			key - название контроллера
			value - название действия	
*/
	return [
		'' => [
			'controller' => 'main',
			'action' => 'index',
		],

		'films' => [
			'controller' => 'film',
			'action'  => 'show',
		],

		'add' => [
			'controller' => 'add',
			'action'  => 'add',
		],

		'import' => [
			'controller' => 'import',
			'action'  => 'import',
		],
	];