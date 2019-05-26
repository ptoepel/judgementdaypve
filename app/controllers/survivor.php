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
		$this->comment = $this->model('Comment');
		$this->message = $this->model('Message');
		$this->hashtag = $this->model('Hashtag');
		$this->mention = $this->model('Mention');


		if(isset($_SESSION)){
			if(isset($_SESSION['email']) ){

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
			$userProfile = $this->user->getProfileByID($userID);
			/*$trendingPosts = $this->post->getMostRecentCommentedPost();*/
			if(isset($_POST['hashtag']) && !empty($_POST['hashtag'])){
				$hashtag = $_POST['hashtag'];
				$hashtagSearchData = $this->hashtag->getHashtags($hashtag);
			}else{
				$hashtagSearchData = null;
			}
				/*$hashData = $this->hashtag->getHashtags();*/
				/*$trendingPosts = $this->post->getMostRecentCommentedPost();*/
				$hashtagData = $this->hashtag->getFiveRecentHashtags();
				



		    for($i = 0; $i < count($userPosts);$i++){
				$profile = $this->user->getProfilePicByID($userPosts[$i]['added_by']);
				$userName = $this->user->getUserNameByID($userPosts[$i]['added_by']);

				array_push($userPosts[$i],$profile,$userName);

				$userPosts[$i]['comments'] = $this->comment->getAllCommentsForPostID($userPosts[$i]['id']);

				if(isset($userPosts[$i]['comments'])){
					if(count($userPosts[$i]['comments']) > 0){
						for($c = 0; $c < count($userPosts[$i]['comments']);$c++){
							$commentProfile = $this->user->getProfilePicByID($userPosts[$i]['comments'][$c]['posted_by']);
							$commentUserName = $this->user->getUserNameByID($userPosts[$i]['comments'][$c]['posted_by']);
					
							array_push($userPosts[$i]['comments'][$c],$commentProfile,$commentUserName);
						}
					}

				}



			}
			
			if(isset($email)){

				$this->view('survivor/index',['data' => $userPosts,'userProfile' => $userProfile,'hashtagData'=> $hashtagData,'hashtagSearchData'=> $hashtagSearchData]);
			}
		}else{
			$this->view('login/index');
		}
	
	}


	function search(){
		if(isset($_POST['search'])){

	
		$searchValue = $_POST['search'];

		
		$email = Session::get('email');
		$this->email = $email;
		$userID = $this->user->getUserIDByEmail($this->email);
		$search = $this->user->search($searchValue);
		$userPosts = $this->post->allPostsByUser($userID);
		$userProfile = $this->user->getProfileByID($userID);
		$this->view('survivor/index',['data' => $userPosts,'userProfile' => $userProfile,'search' => $search]);
		}
	}


	public function post(){

		if(isset($_POST['postBody']) && !empty($_POST['postBody'])){

			$postBody =	$_POST['postBody'];
			$email = Session::get('email');
			$this->email = $email;
			$body =	strip_tags($postBody);
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
				for($i = 0; $i < count($userPosts);$i++){
					$profile = $this->user->getProfilePicByID($userPosts[$i]['added_by']);
					$userName = $this->user->getUserNameByID($userPosts[$i]['added_by']);
	
					array_push($userPosts[$i],$profile,$userName);
	
				}
	

						$this->view('survivor/index', ['flashErr' => $flashMessage['successBlock'],'data' => $userPosts, 'messages'=> $postBody]);
			}
		}else{
			$flashMessage['error'] = "You cannot post a blank field";
			$this->view('survivor/index', ['flashErr' => $flashMessage['error']]);
		}
	}


	public function comment(){

			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			$this->comment->insert($_POST);
		

			if(isset($_SESSION)){
				$email = Session::get('email');
				$this->email = $email;
				$userID = $this->user->getUserIDByEmail($this->email);
				$userPosts = $this->post->allPostsByUser($userID);
				for($i = 0; $i < count($userPosts);$i++){
					$profile = $this->user->getProfilePicByID($userPosts[$i]['added_by']);
					$userName = $this->user->getUserNameByID($userPosts[$i]['added_by']);
	
					array_push($userPosts[$i],$profile,$userName);
	
					$userPosts[$i]['comments'] = $this->comment->getAllCommentsForPostID($userPosts[$i]['id']);
	
					if(isset($userPosts[$i]['comments'])){
						if(count($userPosts[$i]['comments']) > 0){
							for($c = 0; $c < count($userPosts[$i]['comments']);$c++){
								$commentProfile = $this->user->getProfilePicByID($userPosts[$i]['comments'][$c]['posted_by']);
								$commentUserName = $this->user->getUserNameByID($userPosts[$i]['comments'][$c]['posted_by']);
						
								array_push($userPosts[$i]['comments'][$c],$commentProfile,$commentUserName);
							}
						}
	
					}
				}
	
				if(isset($email)){
	
					$this->view('survivor/index',['data' => $userPosts/*,'userProfile' => $userProfile*/]);
				}
			}else{
				$this->view('login/index');
			}
			
		
	}


	public function social()
	{ 
		if(isset($_SESSION)){

			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			$userProfile = $this->user->getProfileByID($userID);
			$allPosts = $this->post->getRecentPosts();

		    for($i = 0; $i < count($allPosts);$i++){

				$profile = $this->user->getProfilePicByID($allPosts[$i]['added_by']);
				$userName = $this->user->getUserNameByID($allPosts[$i]['added_by']);

				array_push($allPosts[$i],$profile,$userName);

				$allPosts[$i]['comments'] = $this->comment->getAllCommentsForPostID($allPosts[$i]['id']);

				if(isset($allPosts[$i]['comments'])){
					if(count($allPosts[$i]['comments']) > 0){
						for($c = 0; $c < count($allPosts[$i]['comments']);$c++){

							$commentProfile = $this->user->getProfilePicByID($allPosts[$i]['comments'][$c]['posted_by']);
							$commentUserName = $this->user->getUserNameByID($allPosts[$i]['comments'][$c]['posted_by']);
					
							array_push($allPosts[$i]['comments'][$c],$commentProfile,$commentUserName);
						}
					}
				}
			}
			if(isset($email)){
				$this->view('survivor/social',['data' => $allPosts]);
			}
		}else{
			$this->view('login/index');
		}
	
		

	
	}


	public function profile()
	{ 
		$email = Session::get('email');
		$this->email = $email;
		$userID = $this->user->getUserIDByEmail($this->email);
		$profile = $this->user->getProfileByID($userID);
		$this->view('survivor/profile',['data' => $profile]);
	}

	public function users()
	{ 
		$users = $this->user->getAllUsers();
		/*Need to add data model to dmg logs*/
		$this->view('survivor/users',['data' => $users]);
	}


	public function upload_profile()
	{
		$target_dir =  "../public/images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["profile_upload"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {

				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		

		$email = Session::get('email');
		$this->email = $email;
		$_POST['fileToUpload'] = $target_file;

		$userID = $this->user->getUserIDByEmail($this->email);


		$profile = $this->user->updateProfileByID($userID,$_POST);

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

	public function topfive()
	{ 
		$data = $this->single->topKills();
		$this->view('survivor/topfive',['data' => $data]);
	}

	public function raw()
	{ 
		$raw = $this->single->getRaw();
		$this->view('survivor/raw',['data' => $raw]);
	}
	
	public function blog()
	{ 
		$this->view('survivor/blog');
	}

	public function messages()
	{
		$this->view('survivor/messages');
	}



	public function upload_damage_logs(){
		$this->view('survivor/upload_damage_logs');
	}

	public function server(){
		
		$cells = array();

	
		
		  $file = explode("\n", file_get_contents('https://customer.i3d.net/gameserver-widget/806741/d6fd920ec9c1fcc85a93918faee6b052070fea6a/0', true));
		  foreach($file as $key => $row){
			  $cells[] = explode(", ",$row);
		  
		
		}
		echo "<pre>";
		print_r($cells);
		echo "</pre>";
	
		$website = explode("\n", file_get_contents('https://customer.i3d.net/gameserver/806741/Miscreated/judgement-day-pve--httpsdiscord.gganw2tej---whitelisted-o/d6fd920ec9c1fcc85a93918faee6b052070fea6a', true));
		foreach($website as $key => $row){
			$array[] = explode(", ",$row);
		
	  
	  }
	  echo "<pre>";
	  print_r($array);
	  echo "</pre>";
  
	
	
	}

	public function uploading_damage_log()
	{
		$target_dir =  "../app/dmg-log/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["profile_upload"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
				// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	function upload_dmg_log()
	{



		$tmpName = $_FILES['fileToUpload']['tmp_name'];
		$csvAsArray = array_map('str_getcsv', file($tmpName));

		echo "<pre>";
		print_r($csvAsArray);
		echo "</pre>";
	}



	function delete_post(){

		if(isset($_POST['deletePost']) && !empty($_POST['deletePost'])){
			$this->postID = $postID;
			$this->userID = Session::get('email');
		}

	}

	function delete_comment(){

		if(isset($_POST['deleteComment']) && !empty($_POST['deleteComment'])){
			$this->commentID = $commentID;
			$this->userID = Session::get('email');
		}
	}

	function hashtag()
	{
		
		if(isset($_SESSION)){
			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			$userPosts = $this->post->allPostsByUser($userID);
			$userProfile = $this->user->getProfileByID($userID);



			if(isset($_POST['hashtag']) && !empty($_POST['hashtag'])){
				$hashtag = $_POST['hashtag'];

				
				$hashtagSearchData = $this->hashtag->getHashtags($hashtag);


				
			}else{
			/*$hashData = $this->hashtag->getHashtags();*/
			/*$trendingPosts = $this->post->getMostRecentCommentedPost();*/
				$hashtagSearchData = null;
			}

			$hashtagData = $this->hashtag->getFiveRecentHashtags();
		    for($i = 0; $i < count($userPosts);$i++){
				$profile = $this->user->getProfilePicByID($userPosts[$i]['added_by']);
				$userName = $this->user->getUserNameByID($userPosts[$i]['added_by']);

				array_push($userPosts[$i],$profile,$userName);

				$userPosts[$i]['comments'] = $this->comment->getAllCommentsForPostID($userPosts[$i]['id']);

				if(isset($userPosts[$i]['comments'])){
					if(count($userPosts[$i]['comments']) > 0){
						for($c = 0; $c < count($userPosts[$i]['comments']);$c++){
							$commentProfile = $this->user->getProfilePicByID($userPosts[$i]['comments'][$c]['posted_by']);
							$commentUserName = $this->user->getUserNameByID($userPosts[$i]['comments'][$c]['posted_by']);
							array_push($userPosts[$i]['comments'][$c],$commentProfile,$commentUserName);
						}
					}

				}



			}
			
			if(isset($email)){

				$this->view('survivor/index',['data' => $userPosts,'userProfile' => $userProfile, 'hashtag' =>$hashtag, 'hashtagData' => $hashtagData, 'hashtagSearchData' => $hashtagSearchData]);
			}
		}else{
			$this->view('login/index');
		}



	}




	function mention()
	{
		
		if(isset($_SESSION)){
			$email = Session::get('email');
			$this->email = $email;
			$userID = $this->user->getUserIDByEmail($this->email);
			$userPosts = $this->post->allPostsByUser($userID);
			$userProfile = $this->user->getProfileByID($userID);
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			if(isset($_POST['mention']) && !empty($_POST['mention'])){

			$mention = ltrim($_POST['mention'], '@');//=> 'f:o:'
			$mentionSearchData = $this->mention->getMentions($mention);
			echo "<pre>";
			print_r($mentionSearchData);
			echo "</pre>";
			}else{
				$mentionSearchData = null;
			}
	
			$hashtagData = $this->hashtag->getFiveRecentHashtags();

			/*$trendingPosts = $this->post->getMostRecentCommentedPost();*/

		    for($i = 0; $i < count($userPosts);$i++){
				$profile = $this->user->getProfilePicByID($userPosts[$i]['added_by']);
				$userName = $this->user->getUserNameByID($userPosts[$i]['added_by']);

				array_push($userPosts[$i],$profile,$userName);

				$userPosts[$i]['comments'] = $this->comment->getAllCommentsForPostID($userPosts[$i]['id']);

				if(isset($userPosts[$i]['comments'])){
					if(count($userPosts[$i]['comments']) > 0){
						for($c = 0; $c < count($userPosts[$i]['comments']);$c++){
							$commentProfile = $this->user->getProfilePicByID($userPosts[$i]['comments'][$c]['posted_by']);
							$commentUserName = $this->user->getUserNameByID($userPosts[$i]['comments'][$c]['posted_by']);
							array_push($userPosts[$i]['comments'][$c],$commentProfile,$commentUserName);
						}
					}

				}



			}
			
			if(isset($email)){

				$this->view('survivor/index',['data' => $userPosts,'userProfile' => $userProfile, 'hashtagData' =>$hashtagData, 'mentionSearchData' => $mentionSearchData]);
			}
		}else{
			$this->view('login/index');
		}



	}






























}/* END CLASS */
