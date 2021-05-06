<?php
class Controller_Registration extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		$this->view->generate('registration_view.php', 'template_view.php');
	}

  function action_registrate()
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $users = getFromTable($GLOBALS['mysqli'], "SELECT * FROM user;");
    foreach ($users as $user) {
      if ($user['login'] === $login) {
        echo "There is such login already";
        die();
      }
    }
    if (!$login || !$password)
    {
      echo "There are should be login and password";
    }
    else
    {
      $query = "INSERT INTO user (login, password) VALUES ('$login', '$password')";
      if (!changeTable($GLOBALS['mysqli'], $query)) {
        echo "Error from post to table";
      } else {
        echo "Success!";
      }
    }
  }
}
?>

