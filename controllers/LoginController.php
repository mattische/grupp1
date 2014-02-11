<?php
class LoginController implements IController
{
	private $lm;
	private $sh;
	function __construct() {
		$this->lm = new LoginModel();
		$this->sh = new SessionHandlerz();

	}

	function index()
	{
		if(!$this->sh->checkSession())
			include("views/loginForm.php");
		else
			header("Location: index.php?c=posts&action=showUserPosts&args[]=".$_SESSION['usr']);
	}

	function checkLogin() {
		
		if($this->sh->checkUser($_POST['usr'], $_POST['pwd'], $this->lm->getDb()))
			header("Location: index.php?c=posts");
		else
			header("Location: index.php?c=login");
	}
}
?>