<?php
session_start();

class AuthClass
{
  private $_login = 'admin';
  private $_password = 'admin';

  public function isAuth()
  {
    if (isset($_SESSION['is_auth']))
    {
      return $_SESSION['is_auth'];
    }
    return false;
  }

  public function auth($login, $password)
  {
    // Admin
    if ($login === $this->_login && $password === $this->_password)
    {
      $_SESSION['is_auth'] = true;
      $_SESSION['login'] = $login;
      return true;
    } 
    // User
    else {
      $users = getFromTable($GLOBALS['mysqli'], "SELECT * FROM user;");
      foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
          $_SESSION['is_auth'] = true;
          $_SESSION['user_id'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM user WHERE login=$login;")[0]['id'];
          $_SESSION['login'] = $login;
          return true;
        }
      }
      return false;
      // var_dump($users);
      // echo "<br>login - $login<br>";
      // echo "<br>password - $password<br>";
      // if ($users[$login] === $password) {
      //   $_SESSION['is_auth'] = true;
      //   $_SESSION['user_id'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM user WHERE login=$login;")[0]['id'];
      //   $_SESSION['login'] = $login;
      //   return true;
      // }
    }
    $_SESSION['is_auth'] = false;
    $_SESSION['login'] = false;
    return false;
  }

  public function getLogin()
  {
    if ($this->isAuth())
    {
      return $_SESSION['login'];
    }
  }

  public function out()
  {
    $_SESSION = array();
    session_destroy();
  }
}
?>
