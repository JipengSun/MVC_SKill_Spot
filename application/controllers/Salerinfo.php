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

    public function show(){

    //$this->load->view('templates/header',$data);

    $this->load->view('Saler/showinfo');
}
}