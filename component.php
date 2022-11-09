<?php

function navbar(){
    echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
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
    </nav>';
}
    

function cart(){
//Get method for adding/remove item to Cart
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