<?php


class Apply extends Controller
{
	public function index($name= '')
	{
    $user = $this->model('User');
		$user->userType = "new";


		$this->view('apply/index', ['userType' => $user->userType]);
	}

  public function customerapply(){
    	$user = $this->model('User');

      $nameErr = array();
      // First Name

			if (empty($_POST['userName'])) {
        $nameErr[] = "user name is required";
      }else{
        $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
      }

      // Email
      if (empty($_POST['email'])) {
        $nameErr[] = "Email is required";
      }else{
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
      }
      // Hear About
      if (empty($_POST['steamID'])) {
        $nameErr[] = "Your 64 bit Steam ID is required";
      }else{
        	$steamID = filter_var($_POST['steamID'], FILTER_VALIDATE_INT);
      }


      /*
      print_r($first_name);
      print_r($last_name);
      print_r($email);
      print_r($hear_about);
      print_r($steam_id);
      print_r($community_question);
      */

    if($nameErr !=null || !empty($nameErr)){
    $this->view('apply/index', ['errors' => $nameErr]);
	}else{



		$user->createPartialUser($userName,$email,$steamID);
    $this->view('apply/review',['userData'=> $user]);
}







  }

  }
