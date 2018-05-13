<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/13
 * Time: 17:37
 */
class Mynotification extends CI_Controller {
    public function index(){

    }
    public function generate(){
        //$this->load->model('User_test');

        $this->load->library('Notification');
        $this->Notification->build();

    }

}