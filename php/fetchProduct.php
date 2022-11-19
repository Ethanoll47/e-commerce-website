<?php

$connect = new PDO("mysql:host=localhost;dbname=thrift_db", "root", "");

$output = '';

$query = '';

if(isset($_POST["query"]))
{
 $search = str_replace(",", "|", $_POST["query"]);
 $query = "
 SELECT * FROM product_tb 
 WHERE product_id REGEXP '".$search."' 
 OR product_brand REGEXP '".$search."' 
 OR product_name REGEXP '".$search."' 
 OR product_size REGEXP '".$search."' 
 OR product_condition REGEXP '".$search."' 
 OR product_price  REGEXP '".$search."'
 OR product_color REGEXP '".$search."' 
 OR product_material REGEXP '".$search."' 
 OR product_category REGEXP '".$search."' 
 ";
}
else
{
 $query = "
 SELECT * FROM product_tb ORDER BY product_id
 ";
}

$statement = $connect->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

$deleteQuery = "";

$id = (isset($_POST['id']) ? $_POST['id'] : '');

if(isset($_GET['delete']) && $_GET['delete'] == true){
  $deleteQuery = "DELETE FROM `product_tb` WHERE product_id = '$id'";
}

$statement = $connect->prepare($deleteQuery);
$statement->execute();

echo json_encode($data);
?>