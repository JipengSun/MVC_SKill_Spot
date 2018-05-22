<?php
$this->load->helper('url');
	if(!isset($_SESSION['username']))
	{
		redirect(site_url('mynotification/login'));
	}
 ?>