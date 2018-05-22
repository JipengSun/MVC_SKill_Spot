<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/8
 * Time: 22:56
 */

class Email extends CI_Controller {
    public function index(){

    }
    public function Verify(){
        $this->load->model('User_test');

        $email = '1160236206@qq.com';
        //$getpasstime = time();
        $smtpemailto = $email;
        $time = date('Y-m-d H:i');
        $emailsubject = 'Test for email';
        $emailbody = 'Dear '.$email."</br> you verified account at ".$time." The whole development team members of SkillSpot sincerely wish you have a nice experience.</br>  Go for it!</br> SkillSpot Development Team";
        $this->load->library('Mailer');
        $this->mailer->sendMail($emailsubject,$emailbody,$smtpemailto);

    }

}