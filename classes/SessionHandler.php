<?php
class SessionHandlerz {
	function __construct() {

	}

	function checkUser($user, $pass, $db) {

		if($this->checkSession())
			return true;

		$row = $db->query("SELECT username, pass, email FROM users WHERE username='".$user . "' AND pass='" . $pass."'");
		if($row) {
			$_SESSION['usr'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			return true;
		}
		return false;
	}

	function checkSession()
	{
		if(!isset($_SESSION['usr']) && !isset($_SESSION['email']))
			return true;
		return false;
	}
}

?>