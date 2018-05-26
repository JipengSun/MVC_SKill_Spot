<?php

class dbconn {
	public $dblocal;
	public function __construct()
	{

	}
	public function initDBO()
	{
		$this->dblocal = new PDO("mysql:host=engg4802.cxqyuivrdn6q.ap-southeast-2.rds.amazonaws.com;dbname=SkillSpot;charset=latin1","lvzheng18","lv15131307",array(PDO::ATTR_PERSISTENT => true));
		$this->dblocal->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		
	}
}
?>
