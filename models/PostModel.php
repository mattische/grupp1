<?php
class PostModel
{
	private $db;

	function __construct() {
		$this->db = new DB();	
	}

	function getAll() {
		return $this->db->query("SELECT id, username, posted, title, tag FROM posts");
	}
}
?>