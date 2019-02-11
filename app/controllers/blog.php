<?php


class Blog extends Controller
{
	public function index($name= '')
	{
		$user = $this->model('User');
		//$user->userType = $_DB;/// Change to DB value
		$this->view('blog/index');
	}


	public function posts($name= '')
	{
/*
			if(!DB::query('SELECT * FROM cms_content')){
        echo "win";
      }
*/
		$user = $this->model('User');
		$user->userType = "home";

		$this->view('blog/posts', ['userType' => $user->userType]);
	}



}
