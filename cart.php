<?php

session_start();
require_once("php/dbcontroller.php");
require_once("php/component.php");

$db_handle = new DBController();

cart();

if(isset($_GET['checkout']) && $_GET['checkout'] == true){
	unset($_SESSION["cart_item"]);
    echo "<script>alert('Order Success! Thank you for shopping with us.')</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Company Name</title>
</head>
<body>
    <?php
  
    if(isset($_SESSION["cart_item"])){
        $total_price = 0;
    ?>
    <!-- Cart -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Cart</h2>   
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>

                    <?php		
                    foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["product_quantity"]*$item["product_price"];
                    ?>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo $item["product_image"]; ?>" width="70px" alt=""></td>
                            <td><?php echo $item["product_brand"]; echo " "; echo $item["product_name"]; ?></td>
                            <td><?php echo $item["product_price"]; ?></td>
                            <td><?php echo $item["product_quantity"]; ?></td>
                            <td><?php echo "RM ". number_format($item_price,2); ?></td>
                            <td><a href="cart.php?action=remove&product_id=<?php echo $item["product_id"]; ?>"><i class="bi bi-trash-fill text-danger"></i></a></td>
                        </tr>
                    </tbody>
                    <?php
                    $total_price += ($item["product_price"]*$item["product_quantity"]);
                    }
                    ?>
                    <tfoot> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4 class="mt-2">Total:</h4></td>
                        <td><h4 class="mt-2"><?php echo "RM ".number_format($total_price, 2); ?></h4></td>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center justify-content-sm-end me-sm-4">
            <a href="cart.php?checkout=true"><button type="submit" class="btn btn-primary text-light btn-lg" name="checkout">Checkout</button></a>
            </div>
        </div>
    </section>
    <?php
    } else {
    ?>
    <!-- When cart is empty  -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Your Cart is Empty</h2>  
        </div>
    </section>
    <?php 
    }

    footer();
    ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
