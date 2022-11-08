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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand order-lg-0">Company Name</a>

            <div class="nav-buttons order-lg-2">
                <button type="button" class="btn position-relative pt-0"><i class="bi bi-cart fs-4 text-secondary"></i></button>
                <button type="button" class="btn position-relative pt-0"><a href="login.html"></a><i class="bi bi-person-circle fs-4 text-secondary"></i></a></button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navmenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-4 py-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link px-4 py-2">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link px-4 py-2">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product Details -->
    <section class="p-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row mt-4">
                <div class="d-flex justify-content-center me-lg-5">
                    <img src="images/adidas_jacket.jpg" alt="">
                </div>
    
                <div class="pt-lg-4">
                    <h6>Adidas</h6>
                    <h4 class="pt-4 pb-4">Sports Jacket &#x2022 Medium</h4>
                    <h2>RM10</h2>
                    <h6><label for="quantity-field" class="form-label  pt-4">Quantity</label></h6>
                    <div class="input-group quantity pb-4">
                        <input type="number" class="form-control text-center" id="quantity-field" value="1" min="1">
                    </div>
                    <button class="btn btn-primary btn-lg">Add to Cart</button>
                    <h4 class="pt-4 pb-2">Description</h4>
                    <span class="lh-lg">Color: Blue <br> Material: Other</span>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="p-5 bg-light">
        <div class="container text-center">
            <h2>New Arrivals</h2>   
            <div class="d-flex flex-wrap justify-content-center">
                <div class="card product m-3" onclick="window.location.href='product.html';">
                    <img src="images/adidas_jacket.jpg" alt="">
                    <div class="card-body">
                        <span>Adidas</span>
                        <h5>Sports Jacket &#x2022 Medium</h5>
                        <h5>RM10</h5>
                    </div>
                </div>

                <div class="card product m-3" onclick="window.location.href='product.html';">
                    <img src="images/adidas_jacket.jpg" alt="">
                    <div class="card-body">
                        <span>Adidas</span>
                        <h5>Sports Jacket &#x2022 Medium</h5>
                        <h5>RM10</h5>
                    </div>
                </div>

                <div class="card product m-3" onclick="window.location.href='product.html';">
                    <img src="images/adidas_jacket.jpg" alt="">
                    <div class="card-body">
                        <span>Adidas</span>
                        <h5>Sports Jacket &#x2022 Medium</h5>
                        <h5>RM10</h5>
                    </div>
                </div>

                <div class="card product m-3" onclick="window.location.href='product.html';">
                    <img src="images/adidas_jacket.jpg" alt="">
                    <div class="card-body">
                        <span>Adidas</span>
                        <h5>Sports Jacket &#x2022 Medium</h5>
                        <h5>RM10</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
