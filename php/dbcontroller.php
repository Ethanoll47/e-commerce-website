<?php
class DBController {
	public $host = "localhost";
	public $user = "root";
	public $password = "";
	public $database = "thrifted_db";
	public $conn;
		
	function __construct() {
		// $database = $this->database;

		$attr = "mysql:host=". $this->host .";dbname=". $this->database;
		$opts =
		[
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this->conn = new PDO($attr, $this->user, $this->password, $opts);
	
	}

	function runQuery($query) {
		$result = $this->conn->query($query);
		while($row=$result->fetch()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  =   $this->conn->query($query);
		$rowcount = $result->rowCount();
		return $rowcount;	
	}

	function getData($id) {
		$sql = "SELECT * FROM `product_tb` WHERE product_id = '$id'";
		$result = $this->conn->query($sql);

		if($result->rowCount() > 0){
			return $result;
		}
	}

	function deleteRow($id) {
		$sql = "DELETE FROM `product_tb` WHERE product_id = '$id'";
		$result = $this->conn->query($sql);
		return $result;
	}
}
?>