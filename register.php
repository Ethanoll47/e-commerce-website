<?php

require_once("php/dbcontroller.php");
require_once("php/component.php");
require_once("php/config.php");

//Create array validation error messages
$validation = array("email" => "", "phonenumber" => "", "password" => "", "postcode" => "");

if(isset($_POST['register'])){
  
    try
    {
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (\PDOException $e)
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

  $table = 'user_tb';
  $firstname = sanitise($pdo, $_POST['firstname']);
  $lastname = sanitise($pdo, $_POST['lastname']);
  $email = sanitise($pdo, $_POST['email']);
  $phonenumber = sanitise($pdo, $_POST['phonenumber']);
  $username = sanitise($pdo, $_POST['username']);
  $password = sanitise($pdo, $_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $address = sanitise($pdo, $_POST['address']);
  $postcode = sanitise($pdo, $_POST['postcode']);
  $city = sanitise($pdo, $_POST['city']);
  $state = sanitise($pdo, $_POST['state']);

  //Data validation
  $validation["email"] = data_validation($_POST['email'],  "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", "Invalid Email Address");
  $validation["phonenumber"] = data_validation($_POST['phonenumber'],  "/^(01)[0-46-9]*[0-9]{7,8}$/", "Invalid Phone Number");
  $validation["password"] = data_validation($_POST['password'], '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', "Invalid Password - At least one letter, at least one number, and it must be 6-12 characters long");
  $validation["postcode"] = data_validation($_POST['postcode'],  "/^\d{5}$/", "Invalid Postcode");

  //If data is valid
  if (($validation["email"] == "") && ($validation["phonenumber"] == "") && ($validation["password"] == "") && ($validation["postcode"] == "")) {
    $query = "INSERT INTO $table (user_id, first_name, last_name, email, phone_number, username, password, address, postcode, city, state)
        VALUES(NULL,$firstname, $lastname, $email, $phonenumber, $username, '$password', $address, $postcode, $city, $state)";

    $result = $pdo->query($query);

    if (!$result) {
      die('Error: ' . mysqli_error());
    }

    //Return to login page
    header("location:login.php");
  }
}

function sanitise($pdo, $str)
{
  $str = htmlentities($str);
  return $pdo->quote($str);
}

//Function for data validation
function data_validation($data, $data_pattern, $data_type)
{
  if (preg_match($data_pattern, $data)) {
    return "";
  } else {
    return $data_type;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
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
            <div class="col form-floating ps-0 mb-3 overflow-hidden">
              <input type="text" class="form-control" id="firstName" placeholder="First name" aria-label="First name" name="firstname">
              <label for="firstName">First Name</label>
            </div>
            <div class="col form-floating pe-0 mb-3 overflow-hidden">
              <input type="text" class="form-control" id="lastName" placeholder="Last name" aria-label="Last name" name="lastname">
              <label for="lastName">Last Name</label>
            </div>
          </div>


          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control <?php if ($validation["email"] != "") { ?>is-invalid <?php } else { ?> <?php } ?>" id="email" placeholder="Email Address" name="email">
            <?php
            if ($validation["email"] != "") { ?>
              <div class="invalid-feedback">
                <?php echo $validation["email"] ?>
              </div>
            <?php
            } else { ?>
            <?php
            }
            ?>
            <label for="email">Email address</label>
          </div>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control <?php if ($validation["phonenumber"] != "") { ?>is-invalid <?php } else { ?> <?php } ?>" id="phoneNumber" placeholder="Phone Number" name="phonenumber">
            <?php
            if ($validation["phonenumber"] != "") { ?>
              <div class="invalid-feedback">
                <?php echo $validation["phonenumber"] ?>
              </div>
            <?php
            } else { ?>
            <?php
            }
            ?>
            <label for="phoneNumber">Phone Number</label>
          </div>

          <h4 class="m-4 text-center">Account Details</h4>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            <label for="username">Username</label>
          </div>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="password" class="form-control <?php if ($validation["password"] != "") { ?>is-invalid <?php } else { ?> <?php } ?>" id="password" placeholder="Password" name="password">
            <?php
            if ($validation["password"] != "") { ?>
              <div class="invalid-feedback">
                <?php echo $validation["password"] ?>
              </div>
            <?php
            } else { ?>
            <?php
            }
            ?>
            <label for="password">Password</label>
          </div>

        </div>

        <div class="col-md d-flex flex-column justify-content-center align-items-center mb-3">
          <h4 class="m-4 text-center">Shipping Information</h4>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">

            <label for="address">Address</label>
          </div>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control <?php if ($validation["postcode"] != "") { ?>is-invalid <?php } else { ?> <?php } ?>" id="postcode" placeholder="Postcode" name="postcode">
            <?php
            if ($validation["postcode"] != "") { ?>
              <div class="invalid-feedback">
                <?php echo $validation["postcode"] ?>
              </div>
            <?php
            } else { ?>
            <?php
            }
            ?>
            <label for="postcode">Postcode</label>
          </div>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control" id="city" placeholder="City" name="city">
            <label for="city">City</label>
          </div>

          <div class="form-floating mb-3 account-input overflow-hidden">
            <input type="text" class="form-control" id="state" placeholder="State" name="state">
            <label for="state">State</label>
          </div>

          <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" name="register" id="register">Create Account</button>
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