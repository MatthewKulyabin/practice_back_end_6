<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<style>
		li {
			display: inline;
			margin-right: 1%;
		}
	</style>
</head>
<body>
	<nav>
		<ul style="display:inline">
			<li><a href="/">Main</a></li>
			<li><a href="/contacts">Contacts</a></li>
			<li><a href="/services">Services</a></li>
			<li><a href="/portfolio">Portfolio</a></li>
			<li><a href="/news">News</a></li>
			<li><a href="/login">Login</a></li>
			<li><a href="/registration">Registration</a></li>
			<li><a href="/admin">Admin</a></li>
		</ul>
	</nav>
	<?php include 'application/views/'.$content_view; ?>
</body>
</html>

