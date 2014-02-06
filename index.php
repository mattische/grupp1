<?php
$title = "Index";
include_once("template/header.php");
echo "<h1>Welcome</h1>";


require_once("classes/db.php");
require_once("controllers/PostController.php");
require_once("models/PostModel.php");

$pc = new PostController();
$pc->showAll();


include_once("template/footer.php");
?>