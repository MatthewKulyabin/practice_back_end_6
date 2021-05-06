<?php
class Controller_Login extends Controller
{
	function __construct()
	{
    $this->auth = new AuthClass();
		$this->view = new View();
	}
	
	function action_index()
	{
		$this->view->generate('login_view.php', 'template_view.php');
	}

  function action_login()
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (!$this->auth->auth($login, $password)) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
  }

  function action_out()
  {
    $this->auth->out();
    echo "You've loged out";
  }
}
?>
