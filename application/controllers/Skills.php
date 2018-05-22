<?php

/**
* 
*/
class Skills extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function show(){

		//$this->load->view('templates/header',$data);

		$this->load->view('skills/skillshow');
	}
}