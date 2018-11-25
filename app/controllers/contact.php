<?php

class Contact extends Controller{
	public function index()
	{
		$this->view('contact/index');
	}

	public function phone()
	{
		$this->view('contact/phone');
	}
}
