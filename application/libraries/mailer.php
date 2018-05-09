<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/8
 * Time: 22:06
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailer{
    public function sendMail($emailsubject,$emailbody,$smtpemailto){
        include_once ('phpmailer/src/SMTP.php');
        include_once ('phpmailer/src/PHPMailer.php');
        include_once ('phpmailer/src/Exception.php');
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.163.com";
        $mail->Port = 465;  // or 994
        $mail->Username = "lukasbill@163.com";
        $mail->Password ="lukasbill970121";
        $mail->SMTPSecure = 'ssl';
        $mail->From = "lukasbill@163.com";
        $mail->FromName = "SkillSpot";
        $mail->Subject = $emailsubject;

        $mail->MsgHTML($emailbody);
        $mail->AddReplyTo($smtpemailto);
        $mail->AddAddress($smtpemailto);
        $mail->IsHTML(true);

        if(!$mail->Send()){
            echo "Message could not be sent. Mailer Error: ",$mail->ErrorInfo;
        }
        else{
            echo "SkillSpot has sent you an Email</br>";
        }

    }
}