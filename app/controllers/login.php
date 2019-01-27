<?php
include('../app/core/Database.php');

class Login extends Controller
{
	public function index()
	{
		$this->view('login/index');
	}

}
