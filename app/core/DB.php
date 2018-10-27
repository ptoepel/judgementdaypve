<?php

class DB {
	
	private $host = "127.0.0.1";
	
	private $dbname = "miscreated";
	
	private $username = "root";
	
	private $password = "";
	
	
	private static function connect(){
		$pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->username,$this->password);
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