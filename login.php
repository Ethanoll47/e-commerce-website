<?php // authenticate3.php

require_once ("php/dbcontroller.php");
$database = new DBController();

require_once ("php/component.php");
require_once ("php/config.php");


if(isset($_POST['email']) && isset($_POST['password'])){
    
  $email_temp = sanitise($pdo,$_POST['email']);
  $password_temp = sanitise($pdo,$_POST['password']);
  $query   = "SELECT * FROM user_tb WHERE email=$email_temp";
  $result  = $pdo->query($query);
  
  if (!$result->rowCount()) {
    echo "<script>alert('Invalid email/password.')</script>";
    echo "<script>window.location = 'login.php'</script>";
  }
  
  $row = $result->fetch();
  $fn  = $row['first_name'];
  $un  = $row['username'];
  $pw  = $row['password'];
  $user_role_id = $row['user_role_id'];
  
  //if (password_verify(str_replace("'", "", $pw_temp), $pw))
  if (password_verify( $password_temp, $pw))
  {
      session_start();
        
      $_SESSION['username'] = $un;
      $_SESSION['user_role_id'] = $user_role_id;
        
      echo "<script>window.location ='index.php'</script>";
  }
  else {
    echo("Invalid email/password combination");
  }
}

function sanitise($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
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
  <form action="login.php" method="post" class="p-5">
    <div class="container">
      <div class="d-flex flex-column justify-content-center align-items-center mb-3">
        <h1 class="m-4 text-center">Log In</h1>

        <div class="form-floating mb-3 input-box">
          <input type="text" class="form-control" id="floatingInput" placeholder="Email Address" name="email">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3 input-box">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3" name="login" id="login">Log In</button>
        <div>
          Don't have an account? <a href="createAccount.php">Sign Up Now</a>
        </div>
      </div>
    </div>
  </form>

  <?php
  footer();
  ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
