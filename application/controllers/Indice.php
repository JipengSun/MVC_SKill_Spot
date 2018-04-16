<?php

/**
* 
*/
class Indice extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function login(){

		//$this->load->view('templates/header',$data);

		$this->load->view('indice/login');
	}
}