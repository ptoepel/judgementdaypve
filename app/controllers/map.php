<?php

class Map extends Controller
{
	public function index()
	{
		$businesses= "";
		$homes = "";
		$this->view('map/index');
	}

}
