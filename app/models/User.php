<?php
require_once('../app/core/Database.php');
class User
{
  private $id;
	public $userName;
	public $password;
  public $repeatPassword;
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

  function createUser($username,$password,$repeatPassword,$email,$steamID){
		$this->userName = $username;
    $this->password = $password;
		$this->$email = $email;
		$this->steamID = $steamID;
		$this->userType = "Survivor";
		$this->isActive = 1;
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
