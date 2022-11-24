<?php 
session_start();

require_once ("php/dbcontroller.php");
$db_handle = new DBController();
require_once("php/component.php");
require_once("php/config.php");


if(isset($_GET['logout']) && $_GET['logout'] == true){
	destroy_session_and_data();
	echo "<script>window.location ='index.php'</script>";
	exit;
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $user = $db_handle->runQuery("SELECT * FROM `user_tb` WHERE `user_id` = '$id'");

	if (count($user) == 1 ) {
        foreach($user as $key=>$value){  
            $username = $user[$key]['username'];
            $firstname = $user[$key]['first_name'];
            $lastname = $user[$key]['last_name'];
            $email = $user[$key]['email'];
            $phonenumber = $user[$key]['phone_number'];
            $address = $user[$key]['address'];
            $postcode = $user[$key]['postcode'];
            $city = $user[$key]['city'];
            $state = $user[$key]['state'];
        }
        
        echo ' <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#editUser").modal("show");
            });
            </script>';
	}
}


if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $db_handle->runQuery("UPDATE `user_tb` SET first_name='$firstname', last_name='$lastname', email='$email', 
    phone_number='$phonenumber', username='$username', `address`='$address', postcode='$postcode', city='$city', `state`='$state'  WHERE `user_id`='$id'");
}

?>

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
    <section class="p-5">
        <div class="container text-center">
            <?php 
            if (isset($_SESSION['user_id'])){
                $id = $_SESSION['user_id']; 
                $user = $db_handle->runQuery("SELECT * FROM `user_tb` WHERE `user_id` = $id");
                if (!empty($user)) {
                    foreach($user as $key=>$value){  
            ?>
            <h2 class="mb-4">User Information
                <a href="profile.php?edit=<?php echo $user[$key]["user_id"]; ?>" class="text-primary"><i class="bi bi-pencil-square"></i></a>  
            </h2>   
            <div class="table-responsive">
            <table class="table align-middle">
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $user[$key]["username"]; ?></td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td><?php echo $user[$key]["first_name"]; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><?php echo $user[$key]["last_name"]; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $user[$key]["email"]; ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $user[$key]["phone_number"]; ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $user[$key]["address"]; ?></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><?php echo $user[$key]["postcode"]; ?></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><?php echo $user[$key]["city"]; ?></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td><?php echo $user[$key]["state"]; ?></td>
                    </tr>
        
            <?php
                    } 
                } 
            }
            ?>
            </table>

            <div class='d-flex flex-wrap justify-content-center'>
                <a href='profile.php?logout=true'><button type='submit' class='btn btn-danger btn-lg' name='logout'>Logout</button></a>
            </div>

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="profile.php" >
                    <div class="mb-3">
                        <label for="brand" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="condition" class="col-form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="col-form-label">Postcode:</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $postcode; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="material" class="col-form-label">City:</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="col-form-label">State:</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </form>
            </div>
            
        </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>