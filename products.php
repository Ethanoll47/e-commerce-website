<?php

session_start();
require_once("dbcontroller.php");

$db_handle = new DBController();
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
    <!-- All Products -->
    <section class="p-5">
        <h1 class="m-4 text-center">Products</h1>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM product_tb ORDER BY product_id");
            if (!empty($product_array)) {
                foreach($product_array as $key=>$value){  
            ?>
                <div class="m-4">
                    <a href="" class="link-dark ">
                        <img src="<?php echo $product_array[$key]["product_image"]; ?>" class="product-image" alt="product image">   
                        <div class="text-center"> 
                            <?php echo $product_array[$key]["product_brand"]; ?>
                            <h3><?php echo $product_array[$key]["product_name"]; ?> | <?php echo $product_array[$key]["product_size"]; ?></h3>
                            <p><?php echo "RM".$product_array[$key]["product_price"]; ?></p>
                        </div>
                    </a> 
                </div> 
            <?php
                }
            }
            ?>
            </div>
        </div>
    </section>

  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
