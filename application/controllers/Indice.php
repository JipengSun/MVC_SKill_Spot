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
	    $pass = password_hash($_POST['signup-pw'],PASSWORD_BCRYPT);
	    $arr = array('username'=> $_POST['username'],'mail' =>$_POST['signup-E'],'password' =>$pass);
	    //$this->user_test->u_insert($arr);
        if ($this->form_validation->run()==FALSE)
        {
            //$this->load->view('skills/skillshow');
            $this->load->view('indice/login');
            //$this->load->view('indice/login');
        }
        else{
            $this->load->view('skills/skillshow');
            $this->user_test->u_insert($arr);
        }
    }

    public function login(){
	    $this->load->model('user_test');
	    $user = $this->user_test->u_select($_POST['email']);
	    //$data['user'] = $user;
	    //$this->load->view('pages/about',$data);
	    if($user){
	        if(password_verify($_POST['password'],$user[0]->password)){
	            echo 'Password Right';
	            $this->load->library('session');
	            $arr = array('uid' => $user[0] -> uid);
	            $this->session->set_userdata($arr);
            }
            else{
	            echo 'Password Wrong';
            }
        }else{
	        echo 'Email Wrong';
        }
    }
    public function is_login(){
	    $this->load->library('session');
	    if($this->session->userdata('u_id')){
	        echo 'logined';
        }
        else{
	        echo 'no login';
        }
    }
    public function logout(){
	    $this->load->library('session');
	    $this->sesssion->unset_userdata('uid');
    }

}