<?php
require_once ('dbcontroller.php');

if(isset($_POST['username']) && isset($_POST['pwd'])){
    
    try
    {
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (\PDOException $e)
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
	$table = 'user_tb';
    $myfirstname = sanitise($pdo,$_POST['firstname']);
	$mylastname = sanitise($pdo,$_POST['lastname']);
	$myusername = sanitise($pdo,$_POST['username']);
	$email = sanitise($pdo,$_POST['email']);
    $mypassword = sanitise($pdo,$_POST['pwd']);
    $mypassword = password_hash($mypassword, PASSWORD_DEFAULT);
    

    $query = "INSERT INTO $table (user_id, first_name, last_name, username, email, password)
			VALUES(NULL,$myfirstname, $mylastname, $myusername, $email, '$mypassword')";
    //dob datetime format = 2013-02-02 10:13:20
    
    $result = $pdo->query($query);
    
    if (! $result){
        die('Error: ' . mysqli_error());
    }
    header("location:registered.php");
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
  <section class="p-5">
    <div class="container">
      <div class="d-flex flex-column justify-content-center align-items-center mb-3">
        <h1 class="m-4 text-center">Create Account</h1>

        <h4 class="m-4 text-center">Personal Details</h4>

        <div class="row">
            <div class="col form-floating mb-3 input-box">
              <input type="text" class="form-control" id="floatingInput" placeholder="First name" aria-label="First name" name="firstname">
              <label for="floatingInput">First Name</label>
            </div>
            <div class="col form-floating mb-3 input-box">
              <input type="text" class="form-control" id="floatingInput" placeholder="Last name" aria-label="Last name" name="lastname">
              <label for="floatingInput">Last Name</label>
            </div>
        </div>

        <div class="form-floating mb-3 input-box">
          <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3 input-box">
            <input type="number" class="form-control" id="floatingInput" placeholder="Phone Number" name="phonenumber">
            <label for="floatingInput">Phone Number</label>
          </div>

        <h4 class="m-4 text-center">Account Details</h4>

        <div class="form-floating mb-3 input-box">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
            <label for="floatingInput">Username</label>
          </div>

        <div class="form-floating mb-3 input-box">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3" name="login" id="login">Create Account</button>
        <div>
          Don't have an account? <a href="createAccount.html">Sign Up Now</a>
        </div>
      </div>
    </div>

  </section>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
