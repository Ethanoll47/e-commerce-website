<?php

session_start();
require_once("php/dbcontroller.php");
require_once("php/component.php");

$db_handle = new DBController();

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $customer = $db_handle->runQuery("SELECT * FROM `user_tb` WHERE `user_id` = '$id'");

	if (count($customer) == 1 ) {
        foreach($customer as $key=>$value){  
            $firstname = $customer[$key]['first_name'];
            $lastname = $customer[$key]['last_name'];
            $email = $customer[$key]['email'];
            $phonenumber = $customer[$key]['phone_number'];
            $address = $customer[$key]['address'];
            $postcode = $customer[$key]['postcode'];
            $city = $customer[$key]['city'];
            $state = $customer[$key]['state'];
        }
        
        echo ' <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#editCustomer").modal("show");
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
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $db_handle->runQuery("UPDATE `user_tb` SET first_name='$firstname', last_name='$lastname', email='$email', 
    phone_number='$phonenumber', `address`='$address', postcode='$postcode', city='$city', `state`='$state'  WHERE `user_id`='$id'");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
    $db_handle->runQuery("DELETE FROM `user_tb` WHERE `user_id` = '$id'");
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
    <!-- All Products -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Customer List</h2>   
            <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>Postcode</th>
                      <th>City</th>
                      <th>State</th>
                      <th colspan="2"></th>
                    </tr>
                </thead>
                
                <?php 
                $customer_array = $db_handle->runQuery("SELECT * FROM `user_tb` WHERE `user_role_id` = 2 ORDER BY `user_id`");
                if (!empty($customer_array)) {
                    foreach($customer_array as $key=>$value){  
                ?>
                    <tr>
                        <td><?php echo $customer_array[$key]["first_name"]; ?></td>
                        <td><?php echo $customer_array[$key]["last_name"]; ?></td>
                        <td><?php echo $customer_array[$key]["email"]; ?></td>
                        <td><?php echo $customer_array[$key]["phone_number"]; ?></td>
                        <td><?php echo $customer_array[$key]["address"]; ?></td>
                        <td><?php echo $customer_array[$key]["postcode"]; ?></td>
                        <td><?php echo $customer_array[$key]["city"]; ?></td>
                        <td><?php echo $customer_array[$key]["state"]; ?></td>
                        <td>
                            <a href="customers.php?edit=<?php echo $customer_array[$key]["user_id"]; ?>" class="text-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>      
                        </td>
                        <td>
                            <a href="customers.php?delete=<?php echo $customer_array[$key]["user_id"]; ?>" class="text-danger"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                <?php
                    } 
                } 
                ?>
            </table>
            </div>
        </div>
    </section>
    

    <!-- Modal -->
    <div class="modal fade" id="editCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Edit Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="customers.php" >
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



    <?php
    footer();
    
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
