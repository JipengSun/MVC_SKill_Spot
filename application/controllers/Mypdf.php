<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/9
 * Time: 15:39
 */


class Mypdf extends CI_Controller {
    public function index(){

    }
    public function generate(){
        $this->load->model('User_test');

        $this->load->library('Newpdf');
        $this->newpdf->generate($salename = 'MengZhen',$payname = 'Jipeng',$sname = "Design work for Jipeng Tower",$stype = "Design",$price = 100000);

    }

}