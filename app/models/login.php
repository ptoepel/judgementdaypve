<?php

class Login {


  function loginUser($email, $password){

    Database::query('SELECT COUNT FROM users WHERE email=:email && password=:password', array(':email'=>$this->email,':password'=>$this->password));

  		if(isset($_POST['loginUser'])){
  			$password = $_POST['password'];
  			$email = $_POST['email'];
  			if(!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){

  				if(strlen($username) >= 3 && strlen($username) <= 32){

  					if(preg_match('/[a-zA-Z0-9_]+/',$username)){

  						if(strlen($password > 6 && strlen($password <= 60))){

  							if(filter_var($email, FILTER_VALIDATE_EMAIL)){

  								DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username' => $username,':password' => password_hash($password,PASSWORD_BCRYPT),':email' => $email ));
  									echo "Success!";
  							}else{
  								echo "Invalid email";
  							}
  						}else{
  							echo "Invalid Password";
  						}

  					}

  				}else{
  					echo "Invalid username";
  				}

  			}else{
  				echo "User Already Exists";
  			}
  		}



	}

  function logoutUser(){
   	Database::query('SELECT userName,password,email,firstName,lastName,steamID,userType,isActive,tagLine,photo FROM users WHERE id=:username', array(':id'=>$this->id));
	}

}
 ?>
