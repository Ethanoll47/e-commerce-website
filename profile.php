<?php // authenticate3.php
session_start();

require_once ('dbcontroller.php');
$database = new DBController();
require_once("component.php");
require_once("config.php");


if(isset($_GET['logout']) && $_GET['logout'] == true){
	destroy_session_and_data();
	echo "<script>window.location ='index.php'</script>";
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Company Name</title>
</head>
<body>
   
    <?php
    if (isset($_SESSION['username']))
    {
        $username = htmlspecialchars($_SESSION['username']);
        
        
        echo "Welcome back $username.<br>
        <button type='submit' class='btn btn-danger btn-lg' name='logout'><a href='profile.php?logout=true'>Logout</a></button>";
               
    }
    else echo "Please <a href='login.php'>Click Here</a> to log in.";
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>