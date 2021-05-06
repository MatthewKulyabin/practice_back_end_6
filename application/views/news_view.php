<h1>News</h1>

<p>
<table>
<tr><td>Title</td><td>Content</td></tr>
<?php
	foreach($data['news'] as $row)
	{
		echo '<tr><td>'.$row['title'].'</td><td>'.$row['content'].'</td></tr></table><br>';
		foreach ($data['comment'] as $row1)
		{
			echo 'Comment: '.$row1['content'].' from user: '.$row1['user_id'].
			"<form method='POST' action='/news/delete'><input type='submit' name='comment_id' value='$row1[id]'/></form>";
		}
		if ($_SESSION['is_auth'] && $_SESSION['login'] !== 'admin')
		{
			echo "<br>".'Leave your comment to: '.$row['title'];
			echo "
			<br>
			<form method='POST' action='/news/comment'>
				<input type='text' name='content' required /><br>
				<input type='text' name='news_id' value='$row[id]' style='display:none;' />
				<input type='submit' />
			</form>
			";
		}
	}
?>
</p>
