<?php
$title = "Index";
include_once("template/header.php");
echo "<h1>Welcome</h1>";

if(!isset($_SESSION['usr'])) {
	echo "<form method='post' action='login.php'>
		 Username:<input type='text' name='usr' /><br />
		 Password:<input type='password' name='pass' /><br />
		 <input type='submit' value='Login' /></form>
		 ";
}
else {
	echo "You are logged in as " . $_SESSION['usr'];
	echo " <a href=logout.php>logout</a>";
}
include_once("classes/db.php");
include_once("classes/PostHandler.php");

$ph = new PostHandler();
$result = $ph->showPosts();

foreach ($result as $key) {
	echo "<p>";
	echo $key['title'] . "<br />" . $key['posted'] . " <a href='profile.php?username=". $key['username'] ."'>".$key['username']."</a><br />";
	echo $key['message'] . "<br />";
	echo "</p>";
}



include_once("template/footer.php");
?>