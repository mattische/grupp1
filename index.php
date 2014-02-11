<?php
session_start();
$title = "Index";
include_once("template/header.php");
echo "<h1>Welcome</h1>";

require_once("routes.php");

require_once("classes/db.php");
require_once("classes/SessionHandler.php");
require_once("controllers/IController.php");

if(!empty($_GET['c'])) 
{

	if(array_key_exists($_GET['c'], $routes)) 
	{
		$controllerClass = $routes[$_GET['c']]."Controller";
		$modelClass = $routes[$_GET['c']]."Model";
		echo $modelClass;
		require_once("models/".$modelClass.".php");
		require_once("controllers/".$controllerClass.".php");

		$controller = new $controllerClass();

		if(isset($_GET['action'])) 
		{
			
			if(in_array($_GET['action'], get_class_methods($controllerClass)))
			{
				$method = $_GET['action'];//which method to be called

				if(isset($_GET['args']))
				{
					
					$arguments = "";//arguments to call method
					for($i = 0; $i < count($_GET['args']); $i++)
					{
						$arguments .= $_GET['args'][$i];
						if($i < count($_GET['args']) - 1)
							$arguments .= ", ";
					}
					$controller->$method($arguments);
				}
				else
					$controller->$method();
				
			}
			else {
				//if method does not exist
			}
							
		}
		else 
		{
			$controller->index();
		}
	}
	
}
else {
	require_once("controllers/PostController.php");
	require_once("models/PostModel.php");
	$pc = new PostController();
	$pc->showAll();
}

include_once("template/footer.php");
?>