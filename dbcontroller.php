<?php
class DBController {
	public $host = "localhost";
	public $user = "root";
	public $password = "";
	public $database = "thrift_db";
	public $conn;

	function __construct() {

		$database = $this->database;

		$attr = "mysql:host=". $this->host .";dbname=";
		$opts =
		[
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this->conn = new PDO($attr, $this->user, $this->password, $opts);

		$sql = "CREATE DATABASE IF NOT EXISTS $database;";
		
		if ($this->conn->query($sql)){

			$attr = "mysql:host=". $this->host .";dbname=". $this->database;
		
			$this->conn = new PDO($attr, $this->user, $this->password, $opts);

			$sql = "CREATE TABLE IF NOT EXISTS `product_tb` (
				`product_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`product_brand` VARCHAR (25) NOT NULL,
				`product_name` VARCHAR (25) NOT NULL,
				`product_size` VARCHAR (25) NOT NULL,
				`product_condition` VARCHAR (50) NOT NULL, 
				`product_price` FLOAT,
				`product_color` VARCHAR (25) NOT NULL,
				`product_material` VARCHAR (25) NOT NULL,
				`product_image` VARCHAR (100),
				`product_image2` VARCHAR (100),
				`product_image_small` VARCHAR (100),
				`product_page` VARCHAR (100)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
						
			$sql = "CREATE TABLE IF NOT EXISTS `user_role_tb` (
			`user_role_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_role` VARCHAR(100) DEFAULT NULL
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "INSERT IGNORE INTO `user_role_tb` (`user_role_id`, `user_role`) VALUES
				(1, 'admin');";

			if (!$this->conn->query($sql)){
				echo "Error inserting data : " . mysqli_error($this->conn);
			}

			$sql = "INSERT IGNORE INTO `user_role_tb` (`user_role_id`, `user_role`) VALUES
				(2, 'user');";

			if (!$this->conn->query($sql)){
				echo "Error inserting data : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `user_tb` (
				`user_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_role_id` INT(11) DEFAULT 1, 
				`first_name` VARCHAR (255) DEFAULT NULL,
				`last_name` VARCHAR (255) DEFAULT NULL,
				`username` VARCHAR (255) NOT NULL,
				`email` VARCHAR (255) DEFAULT NULL,
				`password` VARCHAR (255) NOT NULL,
				FOREIGN KEY (`user_role_id`) references user_role_tb(`user_role_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `order_tb` (
				`order_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_id` INT(11) NOT NULL,
				`customer_address` VARCHAR (100),
				`city` VARCHAR (85),
				`customer_state` VARCHAR (15),
				`postcode` VARCHAR (10),
				`phone_number` VARCHAR (15),
				`credit_card_number` VARCHAR (15),
				`order_date` DATE,
				`payment_time` TIME,
				FOREIGN KEY(`user_id`) references user_tb(`user_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `order_details_tb`(
				`order_id` INT(11),
				`product_id` INT(11),
				PRIMARY KEY (`order_id`, `product_id`),
				FOREIGN KEY (`order_id`) references order_tb(`order_id`),
				FOREIGN KEY (`product_id`) references product_tb(`product_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
		} 
	}

	function connectDB(){
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
} 
?>