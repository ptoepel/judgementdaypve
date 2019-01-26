<?php

class Database {



	private static function connect(){
		$host = 'localhost';

 		$dbname = 'miscreated';

	 	$username = 'root';

		$password = '';


		$pdo = new PDO('mysql:host='. $host .';dbname='. $dbname .';charset=utf8', $username , $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}

	public static function query($query, $params = array()){

		$statement = self::connect()->prepare($query);

		$statement->execute($params);

		if(explode(' ',$query)[0] == 'SELECT'){

		$data = $statement->fetchAll();

		return $data;

		}

	}
}
