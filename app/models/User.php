<?php
require_once('../app/core/Database.php');
class User
{
  private $id;
	public $userName;
	public $password;
	public $email;
	public $firstName;
	public $lastName;
	public $steamID;
	public $userType;
	public $isActive;
	public $tagLine;
	public $photo;

	public function __construct()
	{

  }

  function createPartialUser($username,$email,$steamID){
		$this->userName = $username;
		$this->$email = $email;
		$this->steamID = $steamID;
		$this->userType = "customer";
		$this->isActive = 0;
		Database::query('INSERT INTO users (userName,email,steamID,userType,isActive) VALUES(:userName,:email,:steamID,:userType,:isActive)', array(':userName'=> $this->userName, ':email' => $this->email,':steamID'=>$this->steamID,':userType' => $this->userType, ':isActive'=> $this->isActive ));
	}

  function getUserID($id){
		$this->id = $id;
   	Database::query('SELECT userName,password,email,firstName,lastName,steamID,userType,isActive,tagLine,photo FROM users WHERE id=:username', array(':id'=>$this->id));
	}

	function setUserID(){

	}

  function setUserName(){

	}

	function getUserName(){

	}

}
