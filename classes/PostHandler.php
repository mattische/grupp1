<?php
class PostHandler 
{
	private $db;
	function __construct() {
		$this->db = new DB();
	}


	function showPosts() {
		return $this->db->query("SELECT * FROM posts ORDER BY posted DESC");
	}

	function showUsersPosts($username) {
		return $this->db->query("SELECT * FROM posts WHERE username='".$username."' ORDER BY posted DESC");
	}


	function createPost($username, $message, $title = ""){
		$sql = "";
		if(empty($title))
			$sql = "INSERT INTO posts (username, message) VALUES('".$username."', '".$message."')";
		else
			$sql = "INSERT INTO posts (username, title, message) VALUES('".$username."', '".$title."','".$message."')";

		$this->db->query($sql);
	}

	function deletePost($username, $pid) {
		$this->db->query("DELETE FROM posts WHERE id=" . $pid . " AND username='".$username."'");
	}

}

?>