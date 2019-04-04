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



  function getUserByID($id){
		$this->id = $id;
   	$result = Database::query('SELECT userName,email,steamID FROM users WHERE id=:id', array(':id'=>$this->id));
    return $result;
  }


  function getProfileByID($id){
		$this->id = $id;
   	$result = Database::query('SELECT * FROM users WHERE id=:id', array(':id'=>$this->id));
    return $result;
  }

  function getProfilePicByID($userID){
    $result = Database::query('SELECT profileImage FROM users WHERE id=:id', array(':id'=>$userID));
    return $result;
  }

  function getUserNameByID($userID){
    $result = Database::query('SELECT userName FROM users WHERE id=:id', array(':id'=>$userID));
    return $result;
  }

  function updateProfileByID($id,$val){
    $this->id = $id;
    $this->userName = $val['userName'];
    $this->email = $val['email'];
    $this->country = $val['country'];
    $this->website = $val['website'];
    $this->fileToUpload = $val['fileToUpload'];
      Database::query('UPDATE users SET userName=:userName, email=:email,country=:country,website=:website,profileImage=:profileImage WHERE id=:id',array(':id' => $this->id,':userName' => $this->userName,':email' =>$this->email,':country'=> $this->country,':website' => $this->website,':profileImage'=> $this->fileToUpload));
    }
  


  function getUserIDByEmail($email){

    $result = Database::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email));


    return $result[0]['id'];
  }

  function getAllUsers(){
    $result = Database::query('SELECT id,userName FROM users');
    return $result;

  }




  function userLogin($email,$password){

    $result = Database::query('SELECT * FROM users WHERE email=:email',array(':email'=>$email));

    $num_rows = count($result);
    
    if($num_rows == 0 || empty($num_rows)){
      $flashMessage['error'] = "no such email";
    }else{
      password_verify($password,$result[0]['password']);
      if(password_verify($password,$result[0]['password']) == 1){

           $flashMessage['success'] = "Message posted";

      }else{

        $flashMessage['error'] = "passwords do not match";

      }

    }

      if (isset($flashMessage['error'])) {
          $val = array(
            'flashErr' =>$flashMessage['error'],
            'checkVal' =>false
          );

        return $val;  // code...
      }else{
        $val = array(
          'checkVal' =>$flashMessage['success']
        );
        return $val;
      }
  }


}
