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
        //$this->load->library('session');
	}

	public function index(){

		//$this->load->view('templates/header');
        //var_dump($_SESSION);
        //$this->load->library('session');
        //var_dump($_SESSION);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('indice/login');
        //$this->load->library('session');

		
	}
	public function register(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('signup-E','Email','required',array('required'=> 'You must provide a %s.'));
        $this->form_validation->set_rules('signup-pw','Password','required');
        $this->form_validation->set_rules('signup-repw','Password Confirmation','required');
	    $this->load->model('user_test');
        //$arr = array('username' => $_POST['username']);
        $pass = password_hash($_POST['signup-pw'],PASSWORD_BCRYPT);
        $arr = array('username'=> $_POST['username'],'mail' =>$_POST['signup-E'],'password' =>$pass);
       // $this->session->set_userdata($arr);
	    //$this->user_test->u_insert($arr);
        if ($this->form_validation->run()==FALSE)
        {
            //$this->load->view('skills/skillshow');
            $this->load->view('indice/login');
            //$this->load->view('indice/login');
        }
        else{
            $emailsubject = 'Account Confirmation';
            $smtpemailto = $arr['mail'];
            $a = 'localhost/Skill_Spot/index.php/indice/activation/'.$arr['username'];
            $emailbody =
                '<html>
This is your confirmation address, please copy it in your browser!
<br> 
<a>'.$a.'</a>
</html> ';
            $this->load->library('Mailer');
            $this->mailer->sendMail($emailsubject,$emailbody,$smtpemailto);
            $this->user_test->u_insert($arr);
            $this->load->view('skills/skillshow');

        }
    }

    public function login(){
        //$this->load->library('session');
        session_start();
	    $this->load->helper('form');
	    $this->load->model('user_test');
	   // echo $_POST['email'];
	    $user = $this->user_test->u_select($_POST['email']);
	    $this->load->helper('url');
        //$this->load->library('session');
	    //$data['user'] = $user;
	    //$this->load->view('pages/about',$data);
	    if($user){
	        echo 'User exist';
	        if(password_verify($_POST['login-pw'],$user[0]->password)&&$user[0]->activate==1){
	            //echo 'Password Right';
	            //$this->load->library('session');
                //session_start();
	            //$arr = array('username' => $user[0] -> username);
	           // $this->session->set_userdata($arr);
	            $_SESSION['username'] = $user[0] -> username;
	           // $this->index();
	            echo 'Password Right1';
	            if($_SESSION ['username']== 'admin') {
                    // $this->load->view('notifs/index');
                    echo 'Password Right admin';
                    redirect(site_url('mynotification/index'));
                }
                //echo 'Password Right1wrong';
                redirect(site_url('indice/index'));
            }
            else{
	            //echo 'Password Wrong';
	            //$this->index();
                redirect(site_url('mynotification/index'));

            }
        }else{
	        echo 'Email Wrong';
            //$this->index();
            redirect(site_url('indice/index'));
        }
    }
    public function is_login(){
	    //$this->load->library('session');
	    if($this->session->userdata('username')){
	        echo 'logined';
        }
        else{
	        echo 'no login';
        }
    }
    public function logout(){
	    //$this->load->library('session');
	    //var_dump($_SESSION);
        SESSION_START();
        $this->load->helper('url');
        session_destroy();
        unset($_SESSION['username']);
        //redirect(site_url('indice/index'));
        //echo $_SESSION['username'];
       // echo 'fjskf';
        $this->index();
    }
    public function ajax(){
        $this->load->helper('url');
        //$this->load->model('Notif_model');
        SESSION_START();
        //$this->load->library('session');
        //include "isLogin.php";
        include 'dbconn.php';
        include'sql.php';
        $sql = new sql();
        $array=array();
        $rows=array();
        //echo $_SESSION['username'];
        $listnotif = $sql->listNotifUser($_SESSION['username']);
        //echo var_dump($listnotif);
        //$listnotif = $this->Notif_model->listNotifUser($_SESSION['username']);
        foreach ($listnotif[1] as $key) {
            $data['title'] = 'Notification Title';
            $data['msg'] = $key['notif_msg'];
            $data['icon'] = base_url().'img/SRZK.png';
            $data['url'] = 'http://seegatesite.com';
            $rows[] = $data;
            // update notification database
            $nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
            //$this->Notif_model->updateNotif($key['id'],$nextime);
            $sql->updateNotif($key['id'],$nextime);

        }
        $array['notif'] = $rows;
        $array['stmt'] = $listnotif[3];
        $array['count'] = $listnotif[2];
        $array['result'] = $listnotif[0];
        echo json_encode($array);
    }
    public function broadcast(){
        $this->load->view('notifs/broadcast');
        // $arr = array('notif_msg'=>$msg,'notif_time'=>$time,'username'=>$user);

    }
    public function activation($username){
	    try{
	        $this->load->helper('url');
            $this->load->model('user_test');
            $user = $this->user_test->u_selectname($username);
            //echo gettype($user);
            $id = $user[0]->uid;
            $arr = ['activate' => 1];
            $this->user_test->u_update($id, $arr);
            //session_start();
            //$_SESSION['username'] = $user[0]->username;
            //sleep(3);
            //echo 'You have successfully activated your account! ENJOY SkillSpot!';
            //sleep(3);
            $data['alertinfo'] = 'You have successfully activated your account! ENJOY SkillSpot!';
            $this->load->view('pages/alertpage',$data);
            //redirect(site_url('indice/index'));
            //$this->index();
        }catch (Exception $exception){
                echo "Activation Failure";
                sleep(3);

            }
    }

}