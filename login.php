<?php
$title = "Login";
include_once("template/header.php");
if(isset($_POST['usr']) && isset($_POST['pass'])) {
	include_once("classes/db.php");
	$db = new DB();
	$result = $db->query("SELECT username, pass FROM users WHERE username='".$_POST['usr']."' AND pass='".$_POST['pass']."'");
	
	if(isset($result[0]['username']) && isset($result[0]['pass'])) {
		$_SESSION['usr'] = $_POST['usr'];
		header("Location: profile.php?username=".$_SESSION['usr']);
	}
	else
		header("Location: index.php");	
}
else
	header("Location: index.php");
?>