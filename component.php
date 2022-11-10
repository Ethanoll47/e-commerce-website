<?php

function navbar(){
    echo "
    <nav class='navbar navbar-expand-lg navbar-dark bg-info py-3 fixed-top'>
        <div class='container'>
            <a href='index.php' class='navbar-brand order-lg-0 text-light pt-0'><i class='bi bi-recycle fs-4 text-light'></i> THRIFTED</a>

            <div class='nav-buttons order-lg-2'>
                <button type='button' class='btn position-relative pt-0 pb-1'><a href='cart.php'><i class='bi bi-cart fs-4 text-light'></i></a></button>
                <button type='button' class='btn position-relative pt-0 pb-1'><a href='login.php'></a><i class='bi bi-person-circle fs-4 text-light'></i></a></button>
            </div>

            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navmenu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse order-lg-1' id='navmenu'>
                <ul class='navbar-nav mx-auto text-center'>
                    <li class='nav-item'>
                        <a href='index.php' class='nav-link text-light px-4 py-2'>Home</a>
                    </li>
                    <li class='nav-item'>
                        <a href='products.php' class='nav-link text-light px-4 py-2'>Products</a>
                    </li>
                    <li class='nav-item'>
                        <a href='#about' class='nav-link text-light px-4 py-2'>About Us</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>";
}

function footer(){
    echo "
    <footer class='p-5 bg-info text-white text-center fixed-bottom'>
        <div class='container'>
            <p class='lead'>Copyright &copy 2022 Company Name</p>
            <a href='#' class='position-absolute bottom-0 end-0 p-5'><i class='bi bi-arrow-up-circle h1'></i></a>
        </div>
    </footer>";
}

function product($productbrand, $productname, $productsize, $productcondition, $productprice, $productcolor, $productmaterial, $productimage, $productid, $productpage){
    echo "
    <form method='post' action='$productpage?action=add&product_id=$productid'>
    <section class='p-5'>
        <div class='container'>
            <div class='d-flex flex-column align-items-center justify-content-center flex-lg-row mt-4'>
                <div class='d-flex justify-content-center me-lg-5'>
                    <img src='$productimage' alt=''>
                </div>

                <div class='pt-lg-4'>
                    <h3 class='fw-bold'>$productbrand</h3>
                    <h3 class='pt-4 pb-4'>$productname</h3>
                    <h4>RM$productprice</h4>
                    <h6><label for='quantity-field' class='form-label  pt-3'>Quantity</label></h6>
                    <div class='input-group quantity pb-4'>
                        <input type='number' class='form-control text-center' id='quantity-field' name='product_quantity' value='1' min='1'>
                    </div>
                    <button type='submit' class='btn btn-primary btn-lg' name='add_to_cart'>Add to Cart</button>
                    <h4 class='pt-4 pb-2'>Description</h4>
                    <span class='lh-lg'>Size: $productsize <br> Condition: $productcondition <br> Color: $productcolor <br> Material: $productmaterial</span>
                </div>
            </div>
        </div>
    </section>
    </form>
    ";
}

function productGallery($productbrand, $productname, $productsize, $productprice, $productimage, $productpage){
    echo "
    <div class='card product m-3' onclick='window.location.href='$productpage';'>
        <img src='$productimage' alt='>
        <div class='card-body'>
            <span>$productbrand</span>
            <h5>$productname &#x2022 $productsize</h5>
            <h5>RM$productprice</h5>
        </div>
    </div>";
}

function cart(){

$db_handle = new DBController();
//Get method for adding item to Cart
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["product_quantity"])) {
                $productById = $db_handle->runQuery("SELECT * FROM product_tb WHERE product_id='" . $_GET["product_id"] . "'");
                //get the first data only with index [0]
                            $itemArray = array($productById[0]["product_id"]=>array('product_id'=>$productById[0]["product_id"],
                                         'product_brand'=>$productById[0]["product_brand"], 'product_name'=>$productById[0]["product_name"],
                                         'product_quantity'=>$_POST["product_quantity"], 'product_price'=>$productById[0]["product_price"], 
                                         'product_image'=>$productById[0]["product_image"]));
                
                if(!empty($_SESSION["cart_item"])) {
                                    //checking new add item with currect Cart
                    if(in_array($productById[0]["product_id"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                                            
                                if($productById[0]["product_id"] == $k) {
                                                                   //if the product_quantity  is empty, starting the product_quantity from Zero
                                    if(empty($_SESSION["cart_item"][$k]["product_quantity"])) {
                                        $_SESSION["cart_item"][$k]["product_quantity"] = 0;
                                    }
                                                                    //if the item already in the Cart, add the product_quantity
                                    $_SESSION["cart_item"][$k]["product_quantity"] += $_POST["product_quantity"];
                                }
                        }
                    } 
                                    //if current item is not in the cart, add the item
                                    else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                                    //if the session is empty, start the new session.
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["product_id"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                                            // if no more item in cart, empty the session
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	
    }
}
}
?>