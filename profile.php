<?php
$usr = "NOBODYs";

if(isset($_GET['username']))
	$usr = $_GET['username'];
else
	header("Location: index.php");



$title = $usr."'s homepage";


include_once("template/header.php");
include_once("classes/db.php");
$db = new DB();

if(isset($_SESSION['usr']) && ($_SESSION['usr'] == $_GET['username'])) {
	echo "<form method='post' action='profile.php?username=".$_SESSION['usr']."'>
	title: <input type='text' name='title' /><br />
	message:<br />
	<textarea rows='10' cols='25' name='msg'></textarea><br />
	<input type='submit'></form>";


	if(isset($_POST['msg']) && !empty($_POST['msg'])) {
		$sql = "";
		if(empty($_POST['title']))
			$sql = "INSERT INTO posts (username, message) VALUES('".$_SESSION['usr']."', '".$_POST['msg']."')";
		else
			$sql = "INSERT INTO posts (username, title, message) VALUES('".$_SESSION['usr']."', '".$_POST['title']."','".$_POST['msg']."')";

		$db->query($sql); 
	}
	else
		echo "You must at least enter message body.";

	if(isset($_GET['pid']))
		$db->query("DELETE FROM posts WHERE id=" . $_GET['pid'] . " AND username='".$_SESSION['usr']."'");
}




$result = $db->query("SELECT * FROM posts WHERE username='".$usr."' ORDER BY posted DESC");

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