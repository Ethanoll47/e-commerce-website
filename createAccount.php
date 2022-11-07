<?php
require_once ('config.php');
require_once ('dbcontroller.php');

if(isset($_POST['username']) && isset($_POST['password'])){

    try
    {
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (\PDOException $e)
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

	  $table = 'user_tb';
    $firstname = sanitise($pdo,$_POST['firstname']);
	  $lastname = sanitise($pdo,$_POST['lastname']);
	  $email = sanitise($pdo,$_POST['email']);
    $phonenumber = sanitise($pdo,$_POST['phonenumber']);
    $username = sanitise($pdo,$_POST['username']);
    $password = sanitise($pdo,$_POST['password']);
    $password = password_hash($mypassword, PASSWORD_DEFAULT);
    $address = sanitise($pdo, $_POST['address']);
    $postcode = sanitise($pdo, $_POST['postcode']);
    $city = sanitise($pdo, $_POST['city']);
    $state = sanitise($pdo, $_POST['state']);
    

    $query = "INSERT INTO $table (user_id, first_name, last_name, email, phone_number, username, password, address, postcode, city, state)
			VALUES(NULL,$firstname, $lastname, $email, $phonenumber, $username, '$password', $address, $postcode, $city, $state)";
    //dob datetime format = 2013-02-02 10:13:20
    
    $result = $pdo->query($query);
    
    if (! $result){
        die('Error: ' . mysqli_error());
    }
    header("location:login.php");
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
  <form method="post" class="p-5">
    <h1 class="m-4 text-center">Create Account</h1>
    <div class="container">
      <div class="row gx-3">
        <div class="col-md d-flex flex-column justify-content-center align-items-center mb-3">

          <h4 class="m-4 text-center">Personal Details</h4>
  
          <div class="row gx-3 account-input">
            <div class="col form-floating ps-0 mb-3 text-break">
              <input type="text" class="form-control" id="firstName" placeholder="First name" aria-label="First name" name="firstname">
              <label for="firstName">First Name</label>
            </div>
            <div class="col form-floating pe-0 mb-3">
              <input type="text" class="form-control" id="lastName" placeholder="Last name" aria-label="Last name" name="lastname">
              <label for="lastName">Last Name</label>
            </div>
          </div>
  
  
          <div class="form-floating mb-3 account-input">
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
            <label for="email">Email address</label>
          </div>
  
          <div class="form-floating mb-3 account-input">
              <input type="number" class="form-control" id="phoneNumber" placeholder="Phone Number" name="phonenumber">
              <label for="phoneNumber">Phone Number</label>
            </div>
  
          <h4 class="m-4 text-center">Account Details</h4>
  
          <div class="form-floating mb-3 account-input">
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
              <label for="username">Username</label>
            </div>
  
          <div class="form-floating mb-3 account-input">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <label for="password">Password</label>
          </div>
  
        </div>
  
        <div class="col-md d-flex flex-column justify-content-center align-items-center mb-3">
          <h4 class="m-4 text-center">Shipping Information</h4>
      
          <div class="form-floating mb-3 account-input">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
            <label for="address">Address</label>
          </div>
      
          <div class="form-floating mb-3 account-input">
            <input type="text" class="form-control" id="postcode" placeholder="Postcode" name="postcode">
            <label for="postcode">Postcode</label>
          </div>
      
          <div class="form-floating mb-3 account-input">
            <input type="text" class="form-control" id="city" placeholder="City" name="city">
            <label for="city">City</label>
          </div>
      
          <div class="form-floating mb-3 account-input">
            <input type="text" class="form-control" id="state" placeholder="State" name="state">
            <label for="state">State</label>
          </div>
      
          <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3" name="login" id="login">Create Account</button>
          </div>
  
      </div>
      
    </div>

</form>
  

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
