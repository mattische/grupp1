<?php

foreach ($result as $row) {
	echo "<p><a href='index.php?c=posts&action=showpost&pid=" .$row['id']. "'>";
	echo $row['title'] . "</a> " . $row['posted'] . "<br />by: " . $row['username'];
	echo "<br />";
	
	if(count($tags[$row['id']]) > 0) {
		echo "tags: ";
		for ($i=0; $i < count($tags[$row['id']]); $i++) { 
			echo $tags[$row['id']][$i];
		}
	}

	echo "</p>";
}


?>