<?php
include('../app/core/DB.php');

class Home extends Controller{
	public function index($name= '')
	{
		/*
		$user = $this->model('User');
		$user->name = $name;
		$this->view('home/index', ['name' => $user->name]);
		*/
		$this->view('home/index');
	}

	public function create_account(){
		if(isset($_POST['createaccount'])){
			$username = $_POST['username'];
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



}
