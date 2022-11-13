<?php

session_start();
require_once("php/dbcontroller.php");
require_once("php/component.php");

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
        <div class="container text-center">
            <h2 class="mb-4">Products</h2>   
            <div class="d-flex flex-wrap justify-content-center">
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM `product_tb` WHERE product_category = 'Men' ORDER BY product_id");
            if (!empty($product_array)) {
                foreach($product_array as $key=>$value){  
            ?>
                <div class="card product m-3" onclick="window.location.href='<?php echo $product_array[$key]['product_page']; ?>';">
                    <img src="<?php echo $product_array[$key]["product_image"]; ?>" alt="">
                    <div class="card-body">
                        <span><?php echo $product_array[$key]["product_brand"]; ?></span>
                        <h5><?php echo $product_array[$key]["product_name"]; ?> &#x2022 <?php echo $product_array[$key]["product_size"]; ?></h5>
                        <h5><?php echo "RM".$product_array[$key]["product_price"]; ?></h5>
                    </div>
                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>
    </section>

    <?php
    footer();
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
