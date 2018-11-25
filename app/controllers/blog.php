<?php


class Blog extends Controller
{
	public function index($name= '')
	{
/*
			if(!DB::query('SELECT * FROM cms_content')){
        echo "win";
      }
*/


		$this->view('blog/index');
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
