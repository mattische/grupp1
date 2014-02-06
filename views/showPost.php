<?php

	echo "<h1>" . $row['title']."</h1>";
	echo "<h2>created: " . $row['posted'] . " by: " . $row['username'] . "</h2>";
	echo "<p>" . $row['message'] . "</p>";

?>