<?php

class Survivor extends Controller{

	private $user;
	private $post;
	private $email;

	public function __construct(){
		Session::init();
		$this->user = $this->model('User');
		$this->post = $this->model('Post');
		$this->single = $this->model('Single');
		


		if(isset($_SESSION)){
			if(isset($_SESSION['email'])){

			}else{
				$this->view('login/index');
			}

		}else{
			$this->view('login/index');
		}
		

	}

  public function index()
	{ 
		if(isset($_SESSION)){
			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			$userPosts = $this->post->allPostsByUser($userID);
			if(isset($email)){
				$this->view('survivor/index',['data' => $userPosts]);
			}
		}else{
			$this->view('login/index');
		}
	
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
		}else{
			$flashMessage['error'] = "You cannot post a blank field";
			$this->view('survivor/index', ['flashErr' => $flashMessage['error']]);
		}
	}

	public function comment($postID){


		if(isset($_POST['postComment'])){

			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			
		}
	}






	public function topfive()
	{ 

		/*Need to add data model to dmg logs*/

		$data = $this->single->topKills();
		$this->view('survivor/topfive',['data' => $data]);
	}






	public function raw()
	{ 
		$raw = $this->single->getRaw();
		/*Need to add data model to dmg logs*/

		$this->view('survivor/raw',['data' => $raw]);
	}
	
	


	public function social()
	{ 
		$posts = $this->post->getRecentPosts();

		$this->view('survivor/social',['data' => $posts]);
	}


	public function profile()
	{ 
		$profile = $this->user->getProfileByID();


		$this->view('survivor/profile',['data' => $profile]);
	}

	public function users()
	{ 
		$users = $this->user->getAllUsers();
		/*Need to add data model to dmg logs*/
		$this->view('survivor/users',['data' => $users]);
	}


	public function user($id)
	{ 
		$user = $this->user->getUserByID($id);
		/*Need to add data model to dmg logs*/
		$this->view('survivor/user',['data' => $user]);
	}

	public function story()
	{ 
		$this->view('survivor/story');
	}

	public function discord()
	{ 
		$this->view('survivor/discord');
	}

	public function staff()
	{ 
		$this->view('survivor/staff');
	}
	public function bases()
	{ 
		$this->view('survivor/bases');
	}
	public function rules()
	{ 
		$this->view('survivor/rules');
	}
	public function factions()
	{ 
		$this->view('survivor/factions');
	}


}
