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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand order-lg-0 text-light pt-0"><i class="bi bi-recycle fs-4 text-light"></i> THRIFTED</a>

            <div class="nav-buttons order-lg-2">
                <button type="button" class="btn position-relative pt-0 pb-1"><i class="bi bi-cart fs-4 text-light"></i></button>
                <button type="button" class="btn position-relative pt-0 pb-1"><a href="login.html"></a><i class="bi bi-person-circle fs-4 text-light"></i></a></button>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navmenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light px-4 py-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link text-light px-4 py-2">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link text-light px-4 py-2">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
    

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
                    <tbody>
                        <tr>
                            <td><img src="images/adidas_jacket.jpg" width="70px" alt=""></td>
                            <td>Adidas Jacket</td>
                            <td>RM10</td>
                            <td>1</td>
                            <td>RM10</td>
                            <td><a href="login.html"></a><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <tr>
                            <td><img src="images/adidas_jacket.jpg" width="70px" alt=""></td>
                            <td>Adidas Jacket</td>
                            <td>RM10</td>
                            <td>1</td>
                            <td>RM10</td>
                            <td><a href="login.html"></a><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                        <tr>
                            <td><img src="images/adidas_jacket.jpg" width="70px" alt=""></td>
                            <td>Adidas Jacket</td>
                            <td>RM10</td>
                            <td>1</td>
                            <td>RM10</td>
                            <td><a href="login.html"></a><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                    </tbody>
                    <tfoot> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4 class="mt-2">Total:</h4></td>
                        <td><h4 class="mt-2">RM30</h4></td>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center justify-content-sm-end me-sm-4">
                <button class="btn btn-info text-light btn-lg">Checkout</button>
            </div>
        </div>
    </section>

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
