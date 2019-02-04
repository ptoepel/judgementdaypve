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
		$this->view('home/register');
	}


	public function registerUser(){
		if(isset($_POST['registerUser'])){
			$user = $this->model('User');

			$nameErr = array();
			$fieldsReturned = array();

			// UserName Validation
			if (empty($_POST['userName'])) {
				$nameErr[] = "User name is required";
			}else{
				if(preg_match('/[a-zA-Z0-9_]+/',$_POST['userName'])){
						if(strlen($_POST['userName']) >= 3 && strlen($_POST['userName']) <= 32){
							if(filter_var($_POST['userName'], FILTER_SANITIZE_STRING)){
								$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
							}else{
								$nameErr[] = "Not in a string format";
							}
						}else{
							$nameErr[] = "Your username must be longer than 3 characters and shorter than 32";
						}
				}else{
					$nameErr[] = "Only letters and numbers no special characters";
				}

			}//END Username Valdiation


			//Password Validation
			if (empty($_POST['password'])) {
				$nameErr[] = "Password is required";
			}else{
				if(strlen($_POST['password']) > 6 && strlen($_POST['password'] <= 60)){

				}else{
					$nameErr[] = "Your password needs to be greater than 6 characters but less than 60";
				}


				$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
			}//END Password Validation

			//Repeat Password Validation
			if (empty($_POST['repeatPassword'])) {
				$nameErr[] = "Repeat password is required";
			}else{
				if($_POST['password'] == $_POST['repeatPassword']){

				}else{
					$nameErr[] = "The password field and the repeat password field do not match";
				}
			}

			// Email Validation
			if (empty($_POST['email'])) {
				$nameErr[] = "Email is required";
			}else{
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
						$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
				}else{
				$nameErr[] = "Not an email format";
				}
			}


			// SteamID Validation
			if (empty($_POST['steamID'])) {
				$nameErr[] = "Your 64 bit Steam ID is required";
			}else{ //17
					$steamID = filter_var($_POST['steamID'], FILTER_VALIDATE_INT);
			}


			if($nameErr !=null || !empty($nameErr)){
			$this->view('home/register', ['errors' => $nameErr,'userName'=>$_POST['userName'],'email'=>$_POST['email'],'steamID'=>$_POST['steamID']]);

			}else{

			if(isset($username) && isset($password) && isset($steamID) && isset($email))
			$user->createUser($userName,$email,$steamID);
			$this->view('home/register',['userData'=> $user]);
			}

		}// Log in registerUser is set


	}//End CreateUser Method


	public function loginUser(){

		$user = $this->model('User');

		$nameErr = array();
		// First Name

		if (empty($_POST['email'])) {
			$nameErr[] = "user name is required";
		}else{
			$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
		}


		//Password Validation
		if (empty($_POST['password'])) {
			$nameErr[] = "Password is required";
		}else{
			if(strlen($_POST['password']) > 6 && strlen($_POST['password'] <= 60)){

			}else{
				$nameErr[] = "Your password needs to be greater than 6 characters but less than 60";
			}


			$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
		}//END Password Validation

		if($success == 1){
			$this->view('survivor/home',['userData'=> $user]);
		}elseif($userType == "admin"){
			$this->view('admin/home',['userData'=> $user]);
		}else{
			$this->view('home/index',['flashErr'=> $flashErr]);
		}

	}// LOGIN USER END





















}//End Class
