<?php
require_once './application/database.php';

class Model extends Database
{
	
	public function __construct() {

	}
	
	public function get_data($table)
	{
		$sql="SELECT * FROM $table";
		return $this->connect()->query($sql);
	}

	public function insertData($table, $columns, $values) {
		$sql = "INSERT INTO $table ($columns) VALUES ('$values')";
		return $this->connect()->query($sql);
	}
}