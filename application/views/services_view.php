<h1>Услуги</h1>
<p>
<table>
Все услуги в следующей таблице являются вымышленными, поэтому даже не пытайтесь приобрести их.
<tr><td>Название</td><td>Цена</td></tr>
<?php

  // var_dump($data);
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Price'].'</td></tr>';
	}
	
?>
</table>
</p>
