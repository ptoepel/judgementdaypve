<?php

class Survivor extends Controller{

	private $user;
	private $post;
	private $email;

	public function __construct(){
		Session::init();
		$this->user = $this->model('User');
		$this->post = $this->model('Post');
		


		if(isset($_SESSION)){
print_r($_SESSION);
		$this->email = Session::get('email');
		$this->view('survivor/index');

		}else{
			print_r($_SESSION);
			$this->view('login/index');
		}
		

	}

  public function index()
	{
		$this->view('survivor/index');
	}

	public function post(){
		if(isset($_POST['postHomePage'])){
			$email = Session::get('email');
			$this->email = $email;
			$body =	strip_tags($_POST['postBody']);
			$check_empty = preg_replace('/\s+/','',$body);
			if($check_empty !=""){
				$body_array = preg_split('/\s+/',$body);
				$body = implode(" ",$body_array);
				$date_added = date("Y-m-d H:i:s");
				$addedByID = $this->user->getUserIDByEmail($this->email);

				if($user_to == $added_by){
					$user_to ="none";
				}

				$insertCheck = $this->post->insert($body,$addedByID,$userToID,$dateAdded,$userClosed,$deleted,$likes,$image,$dislikes);

				if($insertCheck != true){
						$this->view('survivor/index', ['flashErr' => $checkValue['flashErr']]);

				}else{
					$this->view('survivor/index',['successBlock' => $checkValue['successBlock']]);
				}


			}
		}
	}









	
	










}
