<?php
class User
{
  private $id;
	private $userName;
	private $password;
  private $hashedPassword;
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

    $result = Database::query('SELECT * FROM users WHERE email=:email',array(':email'=>$email));

    $num_rows = count($result);
    
    if($num_rows == 0 || empty($num_rows)){
      $flashErr[] = "no such email";
    }else{
      password_verify($password,$result[0]['password']);
      if(password_verify($password,$result[0]['password']) == 1){
        /*
          SESSION SET REWORK
        */

        $_SESSION['userName'] = $result[0]['userName'];
        $_SESSION['isActive'] = 1;


      }else{

        $flashErr[] = "passwords do not match";

      }

    }

      if (isset($flashErr)) {
          $val = array(
            'flashErr' =>$flashErr,
            'checkVal' =>false
          );

        return $val;  // code...
      }else{
        $val = array(
          'checkVal' =>true
        );
        return $val;
      }
  }


}
