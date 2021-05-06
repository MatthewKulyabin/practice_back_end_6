<h1>Контакты</h1>
<p>
<table>
Все контакты в следующей таблице являются вымышленными, поэтому даже не пытайтесь обратиться к ним.
<tr><td>Название</td><td>Путь</td></tr>
<?php

  // var_dump($data);
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Way'].'</td></tr>';
	}
	
?>
</table>
</p>

