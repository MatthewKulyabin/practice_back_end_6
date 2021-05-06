<?php
class Model_Admin extends Model
{
	public function get_data()
	{	
		$data = array();
		$data['portfolio'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM portfolio;");
		$data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news;");
		$data['user'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM user;");
		return $data;
	}
}
?>
