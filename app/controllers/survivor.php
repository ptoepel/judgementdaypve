<?php

class Survivor extends Controller{

	public function __construct(){
		if(isset($SESSION)){

		$email = Session::get('email');


		}else{
			$this->view('home/index');
		}
		

	}

  public function index()
	{
		$this->view('survivor/index');
	}

	public function post(){
		if(isset($_POST['postHomePage'])){
			$body =	strip_tags($_POST['postBody']);
			$check_empty = preg_replace('/\s+/','',$body);
			if($check_empty !=""){
				$body_array = preg_split('/\s+/',$body);
				$body = implode(" ",$body_array);
				$date_added = date("Y-m-d H:i:s");
				$addedByID = $this->user->getUserIDByEmail($email);

				if($user_to == $added_by){
					$user_to ="none";
				}

				$post = new Post();

				insert($body,$addedByID,$userToID,$dateAdded,$userClosed,$deleted,$likes,$image,$dislikes);


			}
		}
	}









	
	










}
