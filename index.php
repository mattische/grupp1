<?php
$title = "Index";
include_once("template/header.php");
echo "<h1>Welcome</h1>";

require_once("routes.php");

require_once("classes/db.php");

require_once("models/PostModel.php");


if(!empty($_GET['c'])) {

	if(array_key_exists($_GET['c'], $routes)) {
		$controllerClass = $routes[$_GET['c']];
		require_once("controllers/".$controllerClass.".php");

		$controller = new $controllerClass();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'showpost':
					$controller->showPost($_GET['pid']);
					break;
				
				default:
					$controller->showAll();
					break;
			}
			
		}
		else {
			$controller->showAll();
		}
	}
	
}
else {
	require_once("controllers/PostController.php");
	$pc = new PostController();
	$pc->showAll();
}

include_once("template/footer.php");
?>