<?php

/**
* Jipeng
*/
class Indice extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function index(){

		//$this->load->view('templates/header');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');



        $this->load->view('indice/login');

		
	}
	public function register(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('signup-E','Email','required',array('required'=> 'You must provide a %s.'));
        $this->form_validation->set_rules('signup-pw','Password','required');
        $this->form_validation->set_rules('signup-repw','Password Confirmation','required');
	    $this->load->model('user_test');
	    $arr = array('username'=> $_POST['username'],'mail' =>$_POST['signup-E'],'password' =>$_POST['signup-pw']);
	    //$this->user_test->u_insert($arr);
        if ($this->form_validation->run()==FALSE)
        {
            //$this->load->view('skills/skillshow');
            $this->load->view('indice/login');
            //$this->load->view('indice/login');

        }
        else{
            $this->load->view('skills/skillshow');
            $this->db->u_insert($arr);
        }
    }
}