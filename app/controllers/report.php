<?php
class Report extends Controller
{
	public function index($name= '')
	{
		$raw = $this->model('Single');
		$user= $this->model('User');

		$user->userType = "customer";
		//$user->userType = $_DB;/// Change to DB value
		$this->view('report/index', ['userType' => $user->userType, 'topKills' => $raw->topKills(),'getRaw' => $raw->getRaw()]);
	}


	public function posts($name= '')
	{
/*
			if(!DB::query('SELECT * FROM cms_content')){
        echo "win";
      }
*/


		$this->view('blog/posts');
	}



}
