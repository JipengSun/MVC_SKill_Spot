<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/7
 * Time: 22:19
 */
class Ajax_Post_Controller extends CI_Controller{
    public function index(){
        $this->load->view('templates/ajax_post_view');
    }

    public function user_data_submit(){
        $data = array(
            'username'=>$this->input->post('name'),
            'pwd'=>$this->input->post('pwd')
        );

        echo json_encode($data);
    }
}