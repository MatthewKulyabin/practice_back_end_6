<h1>Admin</h1>
<?php
  if ($_SESSION['login'] === 'admin') {
    // Logout
    echo "<a href='/admin/out'>Log out</a><br><br>";

    // Form for adding to portfolio table
    echo "<fieldset>
      <legend>Add new portfolio</legend>
      <form method='POST' action='admin/post_portfolio'>
        Year of portfolio <input type='text' name='year' required /><br><br>
        Site of portfolio <input type='text' name='site' required /><br><br>
        Description of portfolio <input type='text' name='description' required /><br><br>
        <input type='submit' value='Add' />
      </form>
    </fieldset><br>";

    // Form for adding to news table
    echo "<fieldset>
      <legend>Add new news</legend>
      <form method='POST' action='admin/post_news'>
        Title of news <input type='text' name='title' required /><br><br>
        Content of portfolio <input type='text' name='content' required /><br><br>
        <input type='submit' value='Add' />
      </form>
    </fieldset><br>";

    // Portfolio table
    echo "<table>Portfolio<tr><td>Id</td><td>Delete</td><td>Год</td><td>Проект</td><td>Описание</td></tr>";
    foreach($data['portfolio'] as $row)
    {
      echo '<tr><td><form method="post" action="admin/detail_portfolio"><input type="submit" name="id" value="'.$row['id'].'"/>'
      .'</form></td>'.'<td><form method="post" action="admin/delete_portfolio"><input type="submit" name="id" value="'.$row['id'].'"/></form></td><td>'.$row['Year']
      .'</td><td>'.$row['Site']
      .'</td><td>'.$row['Description'].'</td></tr>';
    }

    // News table
    echo "<table>News<tr><td>Id</td><td>Delete</td><td>Title</td><td>Content</td></tr>";
    foreach($data['news'] as $row)
    {
      echo '<tr><td><form method="post" action="admin/detail_news"><input type="submit" name="id" value="'.$row['id'].'"/>'
      .'</form></td>'.'<td><form method="post" action="admin/delete_news"><input type="submit" name="id" value="'.$row['id'].'"/></form></td><td>'.$row['title']
      .'</td><td>'.$row['content']
      .'</td></tr>';
    }

    // User table
    echo "<table>User<tr><td>Id</td><td>Delete</td><td>Login</td><td>Password</td></tr>";
    foreach($data['user'] as $row)
    {
      echo '<tr><td><form method="post" action="admin/detail_user"><input type="submit" name="id" value="'.$row['id'].'"/>'
      .'</form></td>'.'<td><form method="post" action="admin/delete_user"><input type="submit" name="id" value="'.$row['id'].'"/></form></td><td>'.$row['login']
      .'</td><td>'.$row['password']
      .'</td></tr>';
    }
  } else {
?>
<form method="post" action="/admin/login">
  Login: <input type="text" name="login" /><br /><br />
  Password: <input type="password" name="password" /> <br /><br />
  <input type="submit" />
</form>
<?php
}
