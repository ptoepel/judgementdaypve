<?php

class Home extends Controller{
  public $user;
  private $password;
  private $passwordHash;
  private $email;

	public function __construct(){
		$this->user = $this->model('User');

	}

	public function index()
	{
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
					$this->password = 	$_POST['password'];
			}else{
				$flashErr[] = "Your password needs to be greater than 6 characters but less than 60";
			}
		}//END Password Validation



		//$user->Login($email,$password);
		$checkValue = $this->user->userLogin($this->email,$this->password);

		if($checkValue == true){
			$this->view('survivor/index');
		}else{
        $this->view('home/index',['flashErr' => $flashErr] );

    }


	}// LOGIN USER END


}

public function reset(){

  $this->view('home/reset');
}


public function userReset(){
if(isset($_POST['userReset'])){

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);
  $url = "www.judgementdaypve.com/survivor-reset.php?=". $selector ."&validator=". bin2hex($token);

  $expires = date("U") + 1800;




  $flashErr = array();
  // First Name

  if(empty($_POST['email'])) {
    $flashErr[] = "email is required";
  }else{
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }else{
      $flashErr[] = "email needs to be in a string format";
    }
  }

  Database::query('DELETE FROM userpwdreset WHERE userResetEmail=:email',array(':email' => $this->email));

  $hashedToken = password_hash($token,PASSWORD_DEFAULT);

  Database::query('INSERT INTO userpwdreset (userResetEmail,userResetSelector,userResetToken,userResetExpires) VALUES (:email,:selector,:token,:expires)',array(':email'=> $email,':selector'=>$selector,':token'=> $hashedToken,':expires'=>$expires));

  $to = $email;

  $subject =  'Reset Your Password for Judgement Day PVE';

  $message =  '<p>Please click on the following link to reset your password</p><br/>';
  $message .= '<a href="'. $url .'"> Reset Link </a></p>';

  $headers =  "From: Judement Day PVE <judgmentdaypve@gmail.com>\r\n";
  $headers .= "Reply-To: judgementdaypve@gmail.com\r\n";
  $headers .=  "Content-type: text/html\r\n";

  mail($to,$subject,$message,$headers);




  }


}// LOGIN USER END

public function userResetEmailReset($email,$repeatEmail){

  $selector = $_GET['selector'];
  $validator = $_GET['validator'];
  if(empty($selector) ||empty($validator)){
    echo"Could not validate your request!";

  }else{
    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){

    }


  }


  Database::query('DELETE FROM userReset WHERE userResetEmail=:email',array('email'=> $this->email));

  $hashedToken = password_hash($token,PASSWORD_DEFAULT);

  Database::query('INSERT INTO userReset (userResetEmail,userResetSelector,userResetToken,userResetExpires) VALUES (:email,:selector,:token,:expires)',array(':email'=> $this->email,':selector'=>$this->selector,':token'=> $hashedToken,':expires'=>$expires));

  $to = $email;

  $subject =  'Reset Your Password for Judgement Day PVE';

  $message =  '<p>Please click on the following link to reset your password</p><br/>';
  $message .= '<a href="'. $url .'"> Reset Link </a></p>';

  $headers =  "From: Judement Day PVE <judgmentdaypve@gmail.com>\r\n";
  $headers .= "Reply-To: judgementdaypve#gmail.com\r\n";
  $headers .=  "Content-type: text/html\r\n";

  mail($to,$subject,$message,$headers);




  }










} // End CLass
