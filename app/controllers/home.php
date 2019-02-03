<?php
require_once('../app/core/Database.php');

class Home extends Controller{

	public function index()
	{
		//$user = $this->model('User');

		$this->view('home/index');
	}

	public function register()
	{
		//$user = $this->model('User');

		$this->view('home/register');
	}


	public function createUser(){
		if(isset($_POST['createUser'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$steamID = $_POST['steamID'];
			$repeatPassword = $_POST['repeatPassword'];
			$email = $_POST['email'];
			if(empty($username) || empty($password) || empty($repeatPassword) || empty($email) || empty($steamID)){
				$this->view('home/register',['error'=> "Yo! You can't just submit blank fields. What is wrong with you?"]);
				exit();
			}elseif(!strlen($username) >= 3 && !strlen($username) <= 32){
				$this->view('home/register',['error'=> "Your username must be more than 3 characters and less than 32. Trust me, it makes sense."]);
				exit();
			}elseif($password != $repeatPassword){
				$this->view('home/register',['error'=> "What?! Your passwords don't match."]);
				exit();
			}elseif(!preg_match('/[a-zA-Z0-9_]+/',$username)){
				$this->view('home/register',['error'=> "What?! Your passwords don't match."]);
				exit();
			}elseif(!strlen($password) > 6 && !strlen($password <= 60)){
				$this->view('home/register',['error'=> "Le sigh. Did you know that your password must be greater than 6 characters and less than 60?"]);
				exit();
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$this->view('home/register',['error'=> "Your email format is garbage. Try another."]);
				exit();
			}else{

				if(!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){

					if(strlen($username) >= 3 && strlen($username) <= 32){

						if(preg_match('/[a-zA-Z0-9_]+/',$username)){

							if(strlen($password) > 6 && strlen($password <= 60)){

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

			} //THE ELSE STATEMENT FOR SUCCESS

		}// END CREATEUSER METHOD



	}// ENED EMPTY FIELDS


}
