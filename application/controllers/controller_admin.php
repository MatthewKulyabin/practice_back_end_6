<?php
class Controller_Admin extends Controller
{
  function __construct()
	{
    $this->auth = new AuthClass();
    $this->model = new Model_Admin();
		$this->view = new View();
	}

	function action_index()
	{
    $data = $this->model->get_data();
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

  function action_out()
  {
    $this->auth->out();
    echo "You've loged out";
  }

  function action_login()
  {
    $result = $this->auth->auth($_POST['login'], $_POST['password']);
    if (!$result) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
  }

  // Portfolio
  function action_detail_portfolio()
  {
    $id = $_POST['id'];
    $query = "SELECT * FROM portfolio WHERE id = $id";
    $detailData = getFromTable($GLOBALS['mysqli'], $query)[0];

    if ($_POST['year'] && $_POST['site'] && $_POST['description']) {
      $year = $_POST['year'];
      $site = $_POST['site'];
      $description = $_POST['description'];
      if (strlen($year) > 4 || strlen($site) > 128) {
        echo "Year should be less than 4 and Site should be less then 128";
      } else {
        $query = "UPDATE portfolio SET Year='$year', Site='$site', Description='$description' WHERE id=$id";
        if (!changeTable($GLOBALS['mysqli'], $query)) {
          echo "Error from post to table";
        } else {
          echo "Success!";
        }
      }
    }

    // Change portfolio row form
    echo "<fieldset>
      <legend>Change $id</legend>
      <form method='POST' action='/admin/detail_portfolio'>
        Year of portfolio <input type='text' name='year' required /><br><br>
        Site of portfolio <input type='text' name='site' required /><br><br>
        Description of portfolio <input type='text' name='description' required /><br><br>
        <input type='text' name='id' value='$id' style='display:none;' />
        <input type='submit' value='Change' />
      </form>
    </fieldset><br>";

    // Portfolio table
    echo "<table><tr><td>Id</td><td>Год</td><td>Проект</td><td>Описание</td></tr>";
    echo '<tr><td>'.$detailData['id']
    .'</form></td><td>'.$detailData['Year']
    .'</td><td>'.$detailData['Site']
    .'</td><td>'.$detailData['Description'].'</td></tr>';
    echo "</table>";
  }

  function action_post_portfolio()
  {
    $year = $_POST['year'];
    $site = $_POST['site'];
    $description = $_POST['description'];
    if (strlen($year) > 4 || strlen($site) > 128) {
      echo "Year should be less than 4 and Site should be less then 128";
    } else {
      $query = "INSERT INTO portfolio (Year, Site, Description) VALUES ('$year', '$site', '$description')";
      if (!changeTable($GLOBALS['mysqli'], $query)) {
        echo "Error from post to table";
      } else {
        echo "Success!";
      }
    }
  }

  function action_delete_portfolio()
  {
    $id = $_POST['id'];
    $query = "DELETE FROM portfolio WHERE id=$id";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from delete from table";
    } else {
      echo "Success!";
    }
  }

  // News
  function action_detail_news()
  {
    $id = $_POST['id'];
    $query = "SELECT * FROM news WHERE id = $id";
    $detailData = getFromTable($GLOBALS['mysqli'], $query)[0];

    if ($_POST['title'] && $_POST['content']) {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $query = "UPDATE news SET title='$title', content='$content' WHERE id=$id";
        if (!changeTable($GLOBALS['mysqli'], $query)) {
          echo "Error from post to table";
        } else {
          echo "Success!";
        }
    }

    // Change news row form
    echo "<fieldset>
      <legend>Change $id</legend>
      <form method='POST' action='/admin/detail_news'>
        Title of portfolio <input type='text' name='title' required /><br><br>
        Content of portfolio <input type='text' name='content' required /><br><br>
        <input type='text' name='id' value='$id' style='display:none;' />
        <input type='submit' value='Change' />
      </form>
    </fieldset><br>";

    // News table
    echo "<table><tr><td>Id</td><td>Title</td><td>Content</td></tr>";
    echo '<tr><td>'.$detailData['id']
    .'</form></td><td>'.$detailData['title']
    .'</td><td>'.$detailData['content']
    .'</td></tr>';
    echo "</table>";
  }

  function action_post_news()
  {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $query = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
      if (!changeTable($GLOBALS['mysqli'], $query)) {
        echo "Error from post to table";
      } else {
        echo "Success!";
      }
  }

  function action_delete_news()
  {
    $id = $_POST['id'];
    $query = "DELETE FROM news WHERE id=$id";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from delete from table";
    } else {
      echo "Success!";
    }
  }

  // User table

  function action_detail_user()
  {
    $id = $_POST['id'];
    $query = "SELECT * FROM user WHERE id = $id";
    $detailData = getFromTable($GLOBALS['mysqli'], $query)[0];

    if ($_POST['login'] && $_POST['password']) {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $query = "UPDATE user SET login='$login', password='$password' WHERE id=$id";
        if (!changeTable($GLOBALS['mysqli'], $query)) {
          echo "Error from post to table";
        } else {
          echo "Success!";
        }
    }

    echo "<fieldset>
      <legend>Change $id</legend>
      <form method='POST' action='/admin/detail_user'>
        Login of user <input type='text' name='login' required /><br><br>
        Password of user <input type='text' name='password' required /><br><br>
        <input type='text' name='id' value='$id' style='display:none;' />
        <input type='submit' value='Change' />
      </form>
    </fieldset><br>";

    echo "<table><tr><td>Id</td><td>Login</td><td>Password</td></tr>";
    echo '<tr><td>'.$detailData['id']
    .'</form></td><td>'.$detailData['login']
    .'</td><td>'.$detailData['password']
    .'</td></tr>';
    echo "</table>";
  }

  function action_delete_user()
  {
    $id = $_POST['id'];
    $query = "DELETE FROM user WHERE id=$id";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from delete from table";
    } else {
      echo "Success!";
    }
  }
}
?>
