<?php

$connect = new PDO("mysql:host=localhost;dbname=thrifted_db", "root", "");

$output = '';

$query = "SELECT * FROM user_tb WHERE user_role_id = 2 ORDER BY user_id";

if(isset($_POST["query"]))
{
 $search = str_replace(",", "|", $_POST["query"]);
 $query = "
 SELECT * FROM user_tb 
 WHERE user_role_id = 2
 AND first_name REGEXP '".$search."' 
 OR last_name REGEXP '".$search."' 
 OR address REGEXP '".$search."' 
 OR postcode REGEXP '".$search."' 
 OR city  REGEXP '".$search."'
 OR state REGEXP '".$search."' 
 ";
}
else
{
 $query = "
 SELECT * FROM user_tb WHERE user_role_id = 2 ORDER BY user_id
 ";
}

$statement = $connect->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);
?>