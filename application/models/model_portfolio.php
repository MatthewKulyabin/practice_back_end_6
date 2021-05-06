<?php
class Model_Portfolio extends Model
{
	public function get_data()
	{
		$data = getFromTable($GLOBALS['mysqli'], "SELECT * FROM portfolio;");
		return $data;
	}
}
?>
