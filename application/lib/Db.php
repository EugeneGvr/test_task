<?php

namespace application\lib;

use PDO;

	class Db
	{
		protected $db;			// ексемпляр класа PDO

		function __construct()
		{
			$config = require 'application/config/db.php';
			$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'], $config['password']); // создаем ексемпляр класа PDO
		}

		public function queryAction($sql, $params = [])		// МЕТОД для выполнения запросов который возвращает результат
		{
			$smpt= $this->db->prepare($sql);					// подготавка запроса к выполнению и создание объекта
			if(!empty($params)) {
				foreach ($params as $key => $val) {
					$smpt->bindValue(':'.$key, $val);			// соединение запроса с параметрами
				}
			}
			$smpt->execute();									// выполнение запроса
			return $smpt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function no_answer_queryAction($sql, $params = [])	// МЕТОД для выполнения запросов который не возвращает результат
		{
			$smpt= $this->db->prepare($sql);					// подготавка запроса к выполнению и создание объекта
			if(!empty($params)) {
				foreach ($params as $key => $val) {
					$smpt->bindValue(':'.$key, $val);			// соединение запроса с параметрами
				}
			}
			$smpt->execute();									// выполнение запроса
		}
		
	}