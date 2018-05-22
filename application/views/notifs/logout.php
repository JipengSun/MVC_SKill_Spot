<?php 
SESSION_START();
$this->load->helper('url');
unset($_SESSION['username']);
redirect(site_url('mynotification/index'));
?>