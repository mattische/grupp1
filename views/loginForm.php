<?php
echo "<form action='index.php?c=login&action=checkLogin' method='post'>
	  <input type='text' name='usr' required placeholder='Enter username' /><br />
	  <input type='password' name='pwd' required placeholder='Enter password' /><br />
	  <input type='submit' value='login' /></form>";
?>