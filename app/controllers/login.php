<?php


class Login extends Controller
{
	public function index()
	{
		$this->view('login/index');
	}

	public function register()
	{
		$this->view('login/register');
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
			$this->view('login/register', ['errors' => $nameErr,'userName'=>$_POST['userName'],'email'=>$_POST['email'],'steamID'=>$_POST['steamID']]);

			}else{


			$this->user->registerUser($userName,$this->passwordHash,$this->email,$steamID);
			$this->view('login/register',['userData'=> $this->user]);
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
          $this->view('login/index',['flashErr' => $flashErr] );

      }


  	}// LOGIN USER END


  }

  public function reset(){
    $this->view('login/reset');
  }


  public function userReset(){
    if(isset($_POST['userReset'])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "www.judgementdaypve.com/userResetEmail.php?selector=". $selector ."&validator=". bin2hex($token);

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

    $hashedToken = password_hash($token,PASSWORD_BCRYPT);

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

public function userResetEmail(){
  $selector = $_GET['selector'];
  $validator = $_GET['validator'];
  if(empty($selector) ||empty($validator)){
    echo "Could not validate your request!";
  }else{
    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
      $this->view('login/passwordreset',['selector' => $selector,'validator' => $validator]);
    }
  }
} // userResetEmail



  public function passwordReset(){
    if(isset($_POST['userPasswordReset'])){
      $selector =  $_POST['selector'];
      $validator = $_POST['validator'];
      if(empty($password) || empty($repeatPassword)){
        $error[] = "all fields are required";
      }else{
        if($password != $passwordRepeat){
          $error[] = "The password fields do not match";
        }else{
          $currentDate = date("U");
          $result = Database::query("SELECT * FROM userpwdreset WHERE userResetSelector=:userResetSelector AND userResetExpires >= :userResetExpires",array('userResetSelector' => $selector,'userResetExpires' => $currentDate));
          if (count($result[0]) == 0){
            $error[] = "you need to re-submit your resquest";
          }else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $result[0]['validator']);
            if($tokenCheck == false){
              $error[] = "You need to re-submit your request";
            }elseif($tokenCheck == true){
              $tokenEmail = $result[0]['userResetEmail'];
               $result2 = Database::query("SELECT * FROM users WHERE email=:email",array(':email' => $tokenEmail));
               if (count($result2[0]) == 0){
                 $error[] = "you need to re-submit your resquest";
               }else{
                 $passwordHash = password_hash($password,PASSWORD_BCRYPT);
                 $result3 = Database::query("UPDATE users WHERE password=:password AND email = :email",array(':password' => $passwordHash,':email' => $tokenEmail));
                 if (count($result3[0]) == 0){
                   $error[] = "there was an error";
                 }else{
                   $result4 = Database::query("DELETE FROM userpwdreset WHERE userResetEmail=:email",array(':email' => $tokenEmail));
                   $success = "successfully changed your password";
                   $this->view('login/passwordreset',['success' => $success]);
                 }
               }
            }
          }
        }
      }
    } // userResetEmail
  }



}
