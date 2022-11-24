<?php 
session_start();		

require_once ("php/dbcontroller.php");
$db_handle = new DBController();
require_once("php/component.php");
require_once("php/config.php");

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
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/banner1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/banner2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/banner3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    
               
 <!-- Featured -->
 <section class="p-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Featured Products</h2>   
            <div class="d-flex flex-wrap justify-content-center">
                <?php
                 $result = $db_handle->getData('A001');
                 $row = $result->fetch();
                 productGallery($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_price'], $row['product_image'], $row['product_page']);
              
                 $result = $db_handle->getData('A002');
                 $row = $result->fetch();
                 productGallery($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_price'], $row['product_image'], $row['product_page']);
             
                 $result = $db_handle->getData('A003');
                 $row = $result->fetch();
                 productGallery($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_price'], $row['product_image'], $row['product_page']);
           
                 $result = $db_handle->getData('A004');
                 $row = $result->fetch();
                 productGallery($row['product_brand'], $row['product_name'], $row['product_size'], $row['product_price'], $row['product_image'], $row['product_page']);
                ?>
            </div>
        </div>
    </section>
    
    <!-- About Us -->
    <section class="bg-dark text-light p-5 text-center" style="background-image:url('images/clothes.png'); width: 100%;  background-size: cover; background-position: center;">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between bg-image">
                <div>
                    <h1>Making the World a Thriftier Place</h1>
                    <p class="lead mx-5 my-4">
                    With the fashion industry being one of the world's leading environmental threats, we believe thrifting is the key in helping reduce clothes that end up in landfills.
                    </p>
                    <button class="btn btn-info btn-lg text-light" onclick="window.location.href='about.php';">Learn About Us</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Category -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Shop by Category</h2>   
            <div class="d-flex flex-wrap justify-content-center">
                <div class="card collection m-3" onclick="window.location.href='men.php';">
                    <img src="images/menswear.jpg" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Men</h5>
                        </div>
                    </div>
                </div>
                
                <div class="card collection m-3" onclick="window.location.href='men.php';">
                    <img src="images/womenswear.jpg" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Women</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <?php
    footer();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>