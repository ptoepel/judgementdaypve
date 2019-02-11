<?php

class Home extends Controller{
  public $user;
  private $password;
  private $passwordHash;
  private $email;

	public function __construct(){
		$this->user = $this->model('User');

	}

	public function index()
	{
		$this->view('home/index');
	}





} // End CLass
