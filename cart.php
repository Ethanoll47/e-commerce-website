<?php

session_start();
require_once("dbcontroller.php");
require_once("component.php");

$db_handle = new DBController();

cart();
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
    // Navigation bar
    navbar();
  
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
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
                            <td><?php echo $item["product_brand"]; echo $item["product_name"]; ?></td>
                            <td><?php echo $item["product_price"]; ?></td>
                            <td><?php echo $item["product_quantity"]; ?></td>
                            <td><?php echo "$ ". number_format($item_price,2); ?></td>
                            <td><a href="cart.php?action=remove&product_id=<?php echo $item["product_id"]; ?>"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                    </tbody>
                    <?php
                    $total_quantity += $item["product_quantity"];
                    $total_price += ($item["product_price"]*$item["product_quantity"]);
                    }
                    ?>
                    <tfoot> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4 class="mt-2">Total:</h4></td>
                        <td><h4 class="mt-2"><?php echo "$ ".number_format($total_price, 2); ?></h4></td>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center justify-content-sm-end me-sm-4">
                <button class="btn btn-info text-light btn-lg">Checkout</button>
            </div>
        </div>
    </section>
    <?php
    } else {
    ?>
    <!-- When cart is empty  -->
    <div class="no-records">Your Cart is Empty</div>
    <?php 
    }
    ?>

    <!-- Footer -->
    <footer class="p-5 bg-info text-white text-center fixed-bottom">
        <div class="container">
            <p class="lead">Copyright &copy 2022 Company Name</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
