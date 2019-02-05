<?php
class User
{
  private $id;
	private $userName;
	private $password;
	private $email;
	private $steamID;
	private $userType;
	private $isActive;


	public function __construct()
	{

  }

  function registerUser($username,$password,$email,$steamID){
		$this->userName = $username;
    $this->password = $password;
		$this->$email = $email;
		$this->steamID = $steamID;
		$this->userType = "Survivor";
		$this->isActive = 1;
    print_r($email);
    print_r($this->email);
		Database::query('INSERT INTO users (userName,password,email,steamID,userType,isActive) VALUES(:userName,:password,:email,:steamID,:userType,:isActive)', array(':userName'=> $this->userName,':password'=>$this->password,':email' => $email,':steamID'=>$this->steamID,':userType' => $this->userType, ':isActive'=> $this->isActive ));
	}

  function getUserID($id){
		$this->id = $id;
   	Database::query('SELECT userName,password,email,steamID FROM users WHERE id=:id', array(':id'=>$this->id));
	}


  function setUserName(){

	}

	function getUserName(){

	}

  function userLogin($email,$password){
    $this->email = $email;
    $this->password = $password;
    $result = Database::query('SELECT COUNT(*) FROM users WHERE email=:email && password=:password',array(':email'=>$email,':password'=>$password));
    return $result;
  }

}
