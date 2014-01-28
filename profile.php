<?php
$usr = "NOBODYs";

if(isset($_GET['username']))
	$usr = $_GET['username'];
else
	header("Location: index.php");



$title = $usr."'s homepage";


include_once("template/header.php");
include_once("classes/db.php");
include_once("classes/PostHandler.php");
$ph = new PostHandler();

if(isset($_SESSION['usr']) && ($_SESSION['usr'] == $_GET['username'])) {
	echo "<form method='post' action='profile.php?username=".$_SESSION['usr']."'>
	title: <input type='text' name='title' /><br />
	message:<br />
	<textarea rows='10' cols='25' name='msg'></textarea><br />
	<input type='submit'></form>";


	if(isset($_POST['msg']) && !empty($_POST['msg'])) {
		$sql = "";
		if(empty($_POST['title']))
			$ph->createPost($_SESSION['usr'], $_POST['msg']);
		else
			$ph->createPost($_SESSION['usr'], $_POST['msg'], $_POST['title']);
			 
	}
	else
		echo "You must at least enter message body.";

	if(isset($_GET['pid']))
		$ph->deletePost($_SESSION['usr'], $_GET['pid']);
}




$result = $ph->showUsersPosts($_GET['username']);

foreach ($result as $key) {
	echo "<p>";
	echo $key['title'] . "<br />" . $key['posted'] . " " .$key['username']."<br />";
	echo $key['message'] . "<br />";
	if(isset($_SESSION['usr']) && $_SESSION['usr'] == $_GET['username'])
		echo "Edit | <a href='profile.php?username=".$_SESSION['usr']."&pid=".$key['id']."'>Delete</a>";
	echo "</p>";
}
include_once("template/footer.php");
?>