<h1>Login</h1>

<?php
  if ($_SESSION['is_auth']) {
    echo "<a href='/login/out'>Log Out</a>";
  } else {
?>
<fieldset>
  <form method="POST" action="/login/login">
    Enter your login <input type="text" name="login" required /><br><br>
    Enter your password <input type="text" name="password" required /><br><br>
    <input type="submit" value="Log In" />
  </form>
</fieldset>
<?php
}
