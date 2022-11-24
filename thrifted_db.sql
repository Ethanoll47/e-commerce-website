CREATE DATABASE IF NOT EXISTS `thrifted_db`;

CREATE TABLE IF NOT EXISTS `product_tb` (
				`product_id` VARCHAR(25) NOT NULL PRIMARY KEY,
				`product_brand` VARCHAR (25) NOT NULL,
				`product_name` VARCHAR (25) NOT NULL,
				`product_size` VARCHAR (25) NOT NULL,
				`product_condition` VARCHAR (50) NOT NULL, 
				`product_price` FLOAT,
				`product_color` VARCHAR (25) NOT NULL,
				`product_material` VARCHAR (25) NOT NULL,
				`product_image` VARCHAR (100),
				`product_page` VARCHAR (100),
				`product_category` VARCHAR (100)
			);

INSERT INTO `product_tb` (`product_id`, `product_brand`, `product_name`, `product_size`, `product_condition`, `product_price`, `product_color`, 
			`product_material`, `product_image`, `product_page`, `product_category`) VALUES 
				('A001', 'Zara', 'Shirt', 'Medium', 'Very Good Condition', 20, 'White', 'Other', 'images/zara_shirt.jpg', 'zara_shirt.php', 'Men'),
				('A002', 'Uniqlo', 'T-Shirt', 'Small', 'Very Good Condition', 10, 'Black', 'Cotton', 'images/uniqlo_tshirt.jpg', 'uniqlo_tshirt.php', 'Women'),
				('A003', 'Zara', 'Top', 'Small', 'Very Good Condition', 10, 'Yellow', 'Viscose', 'images/zara_top.jpg', 'zara_top.php', 'Women'),
				('A004', 'Adidas', 'Jacket', 'Medium', 'Good Condition', 10, 'Blue', 'Other', 'images/adidas_jacket.jpg', 'adidas_jacket.php', 'Men'),
				('A005', 'Decathlon', 'Sports Bottoms', 'Medium', 'Very Good Condition', 10, 'Blue', 'Elastane', 'images/decathlon_bottoms.jpg', 'decathlon_bottoms.php', 'Men'),
				('A006', 'Adidas', 'Hoodie', 'Medium', 'Good Condition', 30, 'Black', 'Other', 'images/adidas_hoodie.jpg', 'adidas_hoodie.php', 'Men'),
				('A007', 'Uniqlo', 'Jumpsuit', 'Small', 'Very Good Condition', 35, 'Green', 'Other', 'images/uniqlo_jumpsuit.jpg', 'uniqlo_jumpsuit.php', 'Women'),
				('A008', 'Decathlon', 'Sports Top', 'Medium', 'Very Good Condition', 10, 'Black', '100% Polyester', 'images/decathlon_top.jpg', 'decathlon_top.php', 'Women');

CREATE TABLE IF NOT EXISTS `user_role_tb` (
			`user_role_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_role` VARCHAR(100) DEFAULT NULL
			);

INSERT INTO `user_role_tb` (`user_role_id`, `user_role`) VALUES
				(1, 'admin'),
				(2, 'user');

CREATE TABLE IF NOT EXISTS `user_tb` (
				`user_id` INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`user_role_id` INT(11) DEFAULT 2, 
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
			);

INSERT INTO `user_tb` (`user_role_id`, `first_name`, `last_name`, `email`, `phone_number`, `username`, `password`, `address`, `postcode`, `city`, `state`) VALUES
				(1, 'Edric', 'Leong', 'edricleongyj@gmail.com', '0182666828', 'Edric', '$2y$10\$xcpYtO9rEXHruEj.gxuZFeKAcIYOWf/oBg.wbGHQeXlp4m6Wgt7b6', '20, Jalan Puteri 12/17A, Bandar Puteri', '47100', 'Puchong', 'Selangor');

