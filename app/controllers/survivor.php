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



		}else{
			$this->view('login/index');
		}
		

	}

  public function index()
	{ 
		$email = Session::get('email');
		$this->email = $email;

		$userID = $this->user->getUserIDByEmail($this->email);
		$userPosts = $this->post->allPostsByUser($userID);
		$this->view('survivor/index',['data' => $userPosts]);
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
				$dateAdded = date("Y-m-d H:i:s");


				$addedByID = $this->user->getUserIDByEmail($this->email);
				$userToID = null;
				if($userToID == $addedByID){
					$userToID = 0;
				}
				$userToID = 0;
				$userClosed = date("Y-m-d H:i:s");
				$deleted = "yes";
				$likes = "0";
				$image = "";
				$dislikes = "0";

				$this->post->insert($body,$addedByID,$userToID,$dateAdded,$userClosed,$deleted,$likes,$image,$dislikes);
				$flashMessage['successBlock'] = "Post Successful";
				$userPosts = $this->post->allPostsByUser($addedByID);
						$this->view('survivor/index', ['flashErr' => $flashMessage['successBlock'],'data' => $userPosts]);
			}
		}
	}









	
	










}
