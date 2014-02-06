<?php
class PostController
{
	private $pm;

	function __construct() {
		$this->pm = new PostModel();
	}

	function showAll() {
		//render all posts from database show latest first

		$result = $this->pm->getAll();
		$tags = array();
		foreach ($result as $row) {
			$tags[$row['id']] = explode(",", $row['tag']);
		}
		include_once("views/showAllPosts.php");
	}

	function showUserPosts($username) {
		//get all posts from user (parameter) ordered by date desc
	}

	function showPost($postId) {
		//show one post with postId
	}

	function deletePost($postId) {
		//delete post with postId
	}

	function createPost($username, $message, $title = "") {
		//create a new post
	}

	function editPost($postId, $username, $message, $title = "") {
		//edit an existing post with postId
	}
}

?>