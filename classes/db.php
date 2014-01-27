<?php
class DB
{
	private $pdo;

	function __construct() {
		$this->pdo = new PDO('mysql:host=localhost;dbname=blog_group1', 'root', '');
	}

	
	function query($query) {
		$sth = $this->pdo->prepare($query);
		$sth->execute();
		return $sth->fetchAll();
	}

	function __destruct() {
		$this->pdo = null;
		
	}
}
?>