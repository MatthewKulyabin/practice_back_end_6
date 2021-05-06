<?php
class Model_News extends Model
{
	public function get_data()
	{	
		$data = array();
		$data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news;");
		$data['comment'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM comment;");
		return $data;
	}
}
?>
