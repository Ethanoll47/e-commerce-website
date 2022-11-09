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
				`product_id` VARCHAR(25) NOT NULL PRIMARY KEY,
				`product_brand` VARCHAR (25) NOT NULL,
				`product_name` VARCHAR (25) NOT NULL,
				`product_size` VARCHAR (25) NOT NULL,
				`product_condition` VARCHAR (50) NOT NULL, 
				`product_price` FLOAT,
				`product_color` VARCHAR (25) NOT NULL,
				`product_material` VARCHAR (25) NOT NULL,
				`product_image` VARCHAR (100),
				`product_image2` VARCHAR (100),
				`product_page` VARCHAR (100)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}

			$sql ="INSERT IGNORE INTO `product_tb` (`product_id`, `product_brand`, `product_name`, `product_size`, `product_condition`, `product_price`, `product_color`, 
			`product_material`, `product_image`, `product_image2`, `product_page`) VALUES 
				('A001', 'Zara', 'Shirt', 'Medium', 'Very Good Condition', 20, 'White', 'Other', 'images/zara_shirt.jpg', 'images/zara_shirt2.jpg', 'zara_shirt.php'),
				('A002', 'Uniqlo', 'T-Shirt', 'Small', 'Very Good Condition', 10, 'Black', 'Cotton', 'images/uniqlo_tshirt.jpg', 'images/uniqlo_tshirt2.jpg', 'uniqlo_tshirt.php'),
				('A003', 'Zara', 'Top', 'Small', 'Very Good Condition', 10, 'Yellow', 'Viscose', 'images/zara_top.jpg', 'images/zara_top2.jpg', 'zara_top.php'),
				('A004', 'Adidas', 'Jacket', 'Medium', 'Good Condition', 10, 'Blue', 'Other', 'images/adidas_jacket.jpg', 'images/adidas_jacket2.jpg', 'adidas_jacket.php'),
				('A005', 'Decathlon', 'Sports Bottoms', 'Medium', 'Very Good Condition', 10, 'Blue', 'Elastane', 'images/decathlon_bottoms.jpg', 'images/decathlon_bottoms2.jpg', 'decathlon_bottoms.php');";

			if (!$this->conn->query($sql)){
				echo "Error inserting data : " . mysqli_error($this->conn);
			}
									
			$sql = "CREATE TABLE IF NOT EXISTS `user_role_tb` (
			`user_role_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_role` VARCHAR(100) DEFAULT NULL
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "INSERT IGNORE INTO `user_role_tb` (`user_role_id`, `user_role`) VALUES
				(1, 'admin'),
				(2, 'user');";

			if (!$this->conn->query($sql)){
				echo "Error inserting data : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `user_tb` (
				`user_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_role_id` INT(11) DEFAULT 1, 
				`first_name` VARCHAR (255) DEFAULT NULL,
				`last_name` VARCHAR (255) DEFAULT NULL,
				`email` VARCHAR (255) NOT NULL,
				`phone_number` VARCHAR (15) NOT NULL,
				`username` VARCHAR (255) NOT NULL,
				`password` VARCHAR (255) NOT NULL,
				`address` VARCHAR (255) NOT NULL,
				`postcode` VARCHAR (10) NOT NULL,
				`city` VARCHAR (85) NOT NULL,
				`state` VARCHAR (85) NOT NULL,
				FOREIGN KEY (`user_role_id`) references user_role_tb(`user_role_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `order_tb` (
				`order_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_id` INT(11) NOT NULL,
				`order_date` DATE,
				`payment_time` TIME,
				FOREIGN KEY(`user_id`) references user_tb(`user_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `order_details_tb`(
				`order_id` INT(11),
				`product_id` VARCHAR(25),
				PRIMARY KEY (`order_id`, `product_id`),
				FOREIGN KEY (`order_id`) references order_tb(`order_id`),
				FOREIGN KEY (`product_id`) references product_tb(`product_id`)
			);";

			if (!$this->conn->query($sql)){
				echo "Error creating table : " . mysqli_error($this->conn);
			}
		} 
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
}
?>