<?php

class Home extends Controller{
  public $user;
  private $passwordHash;
  private $email;

	public function __construct(){
		$this->user = $this->model('User');

	}

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

			$nameErr = array();

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
          $this->passwordHash = 	password_hash($_POST['password'], PASSWORD_BCRYPT);
				}else{
					$nameErr[] = "Your password needs to be greater than 6 characters but less than 60";
				}

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
						$this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
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


			$this->user->registerUser($userName,$this->passwordHash,$this->email,$steamID);
			$this->view('home/register',['userData'=> $this->user]);
			}

		}// Log in registerUser is set


	}//End CreateUser Method


	public function userLogin(){
	if(isset($_POST['userLogin'])){
		$flashErr = array();
		// First Name

		if(empty($_POST['email'])) {
			$flashErr[] = "email is required";
		}else{
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			}else{
				$flashErr[] = "email needs to be in a string format";
			}
		}

		//Password Validation
		if (empty($_POST['password'])) {
			$flashErr[] = "Password is required";
		}else{
			if(strlen($_POST['password']) > 6 && strlen($_POST['password'] <= 60)){
					$this->passwordHash = 	password_hash($_POST['password'], PASSWORD_BCRYPT);
			}else{
				$flashErr[] = "Your password needs to be greater than 6 characters but less than 60";
			}
		}//END Password Validation



		//$user->Login($email,$password);
		$result = $this->user->userLogin($this->email,$this->passwordHash);


		if($result[0] == 1){
			$this->view('survivor/index');
		}else{
      $this->flashErr = "Wrong!";
			$this->view('home/index',['flashErr'=> $flashErr]);
    }

	}// LOGIN USER END


}


















}//End Class
