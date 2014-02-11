<?php
class LoginModel
{
	private $db;

	function __construct() {
		$this->db = new DB();	
	}

	function getDb()
	{
		return $this->db;
	}
}
?>