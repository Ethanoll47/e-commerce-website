<?php

session_start();
require_once("php/dbcontroller.php");
require_once("php/component.php");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Company Name</title>
</head>
<body>
    <?php
    $result = $db_handle->getData('A001');
    $row = $result->fetch();
    product($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_condition'], $row['product_price'], $row['product_color'], $row['product_material'], $row['product_image'], $row['product_id'], $row['product_page']);
    ?>


    <!-- You may also like -->
    <section class="p-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">You May Also Like</h2>      
            <div class="d-flex flex-wrap justify-content-center">
                <?php
                 $result = $db_handle->getData('A003');
                 $row = $result->fetch();
                 productGallery($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_price'], $row['product_image'], $row['product_page']);
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
