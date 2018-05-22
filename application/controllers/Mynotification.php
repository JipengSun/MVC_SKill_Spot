<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/13
 * Time: 17:37
 */

class Mynotification extends CI_Controller {
    public function index(){
        //$this->load->library('session');
        //$this->session->set_userdata('username','admin');
        //var_dump($_SESSION);
        SESSION_START();
        $this->load->view('notifs/index');
    }
    public function broadcast(){
        //$this->load->library('session');
        //$this->session->set_userdata('username','admin');
        $this->load->view('notifs/broadcast');
       // $arr = array('notif_msg'=>$msg,'notif_time'=>$time,'username'=>$user);

    }
    public function logout(){
        $this->load->view('notifs/logout');

    }
    public function login(){
        //include "dbconn.php";
        //include "sql.php";
        //$this->load->view('notifs/login');
        //$sql = new sql();
        //$user = $sql->listUser();
        //$this->load->view('notifs/login');
        //$this->load->view('indice/index');
        $this->load->helper('url');
        redirect(site_url('indice/index'));

    }
    public function ajax(){
        $this->load->helper('url');
        //$this->load->model('Notif_model');
        SESSION_START();
        //$this->load->library('session');
        include "isLogin.php";
        include 'dbconn.php';
        include'sql.php';
        $sql = new sql();
        $array=array();
        $rows=array();
        $listnotif = $sql->listNotifUser($_SESSION['username']);
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
        $array['count'] = $listnotif[2];
        $array['result'] = $listnotif[0];
        echo json_encode($array);

    }


}