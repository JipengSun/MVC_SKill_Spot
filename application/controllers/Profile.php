<?php

/**
* 
*/
class Profile extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function setup(){

		//$this->load->view('templates/header',$data);

		$this->load->view('profile/profile_setup');
	}
}