<?php

/**
* 
*/
class Profile extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function setup(){

		//$this->load->view('templates/header',$data);
        session_start();
        echo $_SESSION['username'];

		$this->load->view('profile/profile_setup');


	}
	public function crop(){
	    $this->load->helper('url');

        $imgUrl = $_POST['imgUrl'];
        // original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
        // resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
        // offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
        // crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
        // rotation angle
        $angle = $_POST['rotation'];

        $jpeg_quality = 100;
        session_start();
        //Need to change when deploying on the server.
//        $output_filename = "/Applications/XAMPP/xamppfiles/htdocs/Skill_Spot/img/tmp/avatar_".$_SESSION['username'];
        $output_filename = "/Applications/XAMPP/xamppfiles/htdocs/Skill_Spot/img/tmp/avatar_".$_SESSION['username'];
        $output_filename2 = base_url()."img/tmp/avatar_".$_SESSION['username'];

        // uncomment line below to save the cropped image in the same location as the original image.
        //$output_filename = dirname($imgUrl). "/croppedImg_".rand();

        $what = getimagesize($imgUrl);

        switch(strtolower($what['mime']))
        {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
                $source_image = imagecreatefrompng($imgUrl);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
                $source_image = imagecreatefromgif($imgUrl);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }


        //Check write Access to Directory

        if(!is_writable(dirname($output_filename))){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );
        }else{

            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $output_filename.$type, $png_quality);
            imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => $output_filename2.$type
            );
        }
        print json_encode($response);
	}
	public function update(){
        $this->load->model('user_test');
        $user = $this->user_test->u_selectname($_SESSION['username']);
        $id = $user[0]->uid;
        $arr1 = ['activate' => 1];
        $this->user_test->u_update($id, $arr1);

    }

    public function ascdecode($mesg) {
	    if (preg_match("/[^,\d]/", $mesg)) {
	        die();
        }

	    $result = explode(",", $mesg);
	    $string = "";
	    foreach ($result as $char) {
	        $string .= chr((int)$char);
        }

        return $string;
    }

    public function collectinfo(){
	    session_start();
        $this->load->model('user_test');
        $this->load->model('Service_model');
        $user = $this->user_test->u_selectname($_SESSION['username']);
        $id = $user[0]->uid;
        $arr = array(
            'uid'=>$id,
            'username'=>$_SESSION['username'],
            'sname'=>$this->ascdecode($_GET['service']),
            'stype'=>$_GET['cate'],
            'price'=>$_GET['price'],
            'slocation'=>$this->ascdecode($_GET['addr']),
            'slat' => $_GET['lat'],
            'slng' => $_GET['lng']);
        $this->Service_model->s_insert($arr);
        echo 'Success';
    }


}