<?php

class Survivor extends Controller{

  public function index()
	{
		$this->view('survivor/index');
	}

	public function stuff()
	{
		$this->view('contact/phone');
	}
}
