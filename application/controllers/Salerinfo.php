<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/23
 * Time: 14:42
 */
class Salerinfo extends CI_Controller
{

    function __construct()
    {
        # code...
        parent::__construct();
    }

    public function show($username){
        $this->load->model('Service_model');
        $data['info'] = $this->Service_model->searchallbyname($username);
        $this->load->view('Saler/showinfo',$data);
    }
    public function order($uid){
        session_start();
        $this->load->model('User_test');
        $this->load->model('Service_model');
        $this->load->model('Order_model');
        $result = $this->User_test->u_selectname($_SESSION['username']);
        $id = $result[0]->uid;
        //$name = $result[0]->username;
        $service = $this->Service_model->s_select($_POST['service'])[0];
        $arr = array(
            'saleid'=>$uid,
            'buyid'=>$id,
            'omoney'=>$service->price,
            'ostatus'=>'order',
            'omessage'=>$_POST['msg'],
            'sid'=>$service->sid
        );
        $this->Order_model->insertorder($arr);
        //echo 'Success!';
        $this->load->library('Newpdf');
        $this->newpdf->generate($salename = $service->username,$payname = $_SESSION['username'],$sname = $service->sname,$stype = $service->stype,$price = $service->price);

    }

}