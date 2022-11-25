<?php
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
        destroy_session_and_data();

        echo "<script>alert('Session time out. You have been logged out.')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    $_SESSION['LAST_ACTIVITY'] = time(); //Update last activity time stamp
}

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info py-3">
    <div class="container">
        <a href="index.php" class="navbar-brand order-lg-0 text-light pt-0"><i class="bi bi-recycle fs-4 text-light"></i> THRIFTED</a>

        <div class="nav-buttons order-lg-2">
            <button type="button" class="btn position-relative pt-0 pb-1"><a href="cart.php"><i class="bi bi-cart fs-4 text-light"></i></a></button>
            <?php
            // Only visible if logged in
            if (isset($_SESSION['user_id'])) { ?>
                <button type="button" class="btn position-relative pt-0 pb-1"><a href="profile.php"><i class="bi bi-person-circle fs-4 text-light"></i></a></button>
            <?php
            }
            // Only visible if not logged in
            else {
            ?>
                <button type="button" class="btn position-relative text-light pt-0 pb-1"><a href="login.php" class="text-light">Login</a></button>
            <?php
            }
            ?>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-lg-1" id="navmenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-light px-4 py-2">Home</a>
                </li>
                <li class="nav-item">
                    <a href="women.php" class="nav-link text-light px-4 py-2">Women</a>
                </li>
                <li class="nav-item">
                    <a href="men.php" class="nav-link text-light px-4 py-2">Men</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link text-light px-4 py-2">About Us</a>
                </li>
                <!-- Only visible to Admin -->
                <?php
                if (isset($_SESSION['user_role_id'])) {
                    if ($_SESSION['user_role_id'] == 1) { ?>
                        <li class="nav-item">
                            <a href="customers.php" class="nav-link text-light px-4 py-2">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="products.php" class="nav-link text-light px-4 py-2">Products</a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<?php
function footer()
{
    echo "
    <footer class='p-5 bg-info text-white text-center mt-auto start-0 end-0'>
        <div class='container'>
            <div class='row'>
                <div class='col-md'>
                    <h2>About Us</h2>
                    <p class='about'>Thrifted in a Malaysia-based company that sells second-hand clothing. We aim to provide customers with the best online shopping experience while also reducing the number of clothes that end up in landfills. Join us making the world a better and thriftier place. </p>
                </div>
                <div class='col-md'>
                    <h2>Contact Us</h2>
                    <ul class='list-unstyled'>
                        <li>Email: Incase@gmail.com</li>
                        <li>Phone: 010-0010-9980</li>
                        <li>Fax: 010-0010-9980</li>
                    </ul>
                    <div>
                        <a href='#'><i class='bi bi-facebook text-dark mx-1'></i></a>
                        <a href='#'><i class='bi bi-instagram text-dark mx-1'></i></a>
                        <a href='#'><i class='bi bi-twitter text-dark mx-1'></i></a>
                        <a href='#'><i class='bi bi-linkedin text-dark mx-1'></i></a>
                    </div>
                </div>
                <div class='col-md'>
                    <h2>Links</h2>
                    <ul class='list-unstyled'>
                        <li><a href='index.php' class='text-light'>Home</a></li>
                        <li><a href='women.php' class='text-light'>Women</a></li>
                        <li><a href='men.php' class='text-light'>Men</a></li>
                        <li><a href='about.php' class='text-light'>About Us</a></li>
                    </ul>
                </div>
                
            </div>
            <div class='mt-3'>
                <p class='lead'>Copyright &copy 2022 Thrifted</p>
            </div>
        </div>
    </footer>
    ";
}

function product($productbrand, $productname, $productsize, $productcondition, $productprice, $productcolor, $productmaterial, $productimage, $productid, $productpage)
{
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

function productGallery($productbrand, $productname, $productsize, $productprice, $productimage, $productpage)
{
    echo "
    <div class='card product m-3' onclick='window.location.href=`$productpage`;'>
        <img src='$productimage' alt=''>
        <div class='card-body'>
            <span>$productbrand</span>
            <h5>$productname &#x2022 $productsize</h5>
            <h5>RM$productprice</h5>
        </div>
    </div>";
}

function cart()
{
    $db_handle = new DBController();
    //Get method for adding item to Cart
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["product_quantity"])) {
                    $productById = $db_handle->runQuery("SELECT * FROM product_tb WHERE product_id='" . $_GET["product_id"] . "'");
                    //Get the first data only with index[0]
                    $itemArray = array($productById[0]["product_id"] => array(
                        'product_id' => $productById[0]["product_id"],
                        'product_brand' => $productById[0]["product_brand"], 'product_name' => $productById[0]["product_name"],
                        'product_quantity' => $_POST["product_quantity"], 'product_price' => $productById[0]["product_price"],
                        'product_image' => $productById[0]["product_image"]
                    ));

                    if (!empty($_SESSION["cart_item"])) {
                        //Check the added item with currect cart
                        if (in_array($productById[0]["product_id"], array_keys($_SESSION["cart_item"]))) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {

                                if ($productById[0]["product_id"] == $k) {
                                    //If product_quantity is empty, set the product_quantity to 0
                                    if (empty($_SESSION["cart_item"][$k]["product_quantity"])) {
                                        $_SESSION["cart_item"][$k]["product_quantity"] = 0;
                                    }
                                    //If the item already in the cart, add the product_quantity
                                    $_SESSION["cart_item"][$k]["product_quantity"] += $_POST["product_quantity"];
                                }
                            }
                        }
                        //If current item is not in the cart, add the item to the cart
                        else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        //If the session is empty, start the new session
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                break;
            case "remove":
                if (!empty($_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($_GET["product_id"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                        //If the cart is empty, empty the session
                        if (empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
        }
    }
}

function destroy_session_and_data()
{
    unset($_SESSION['user_id'], $_SESSION['user_role_id']);

    $_SESSION = array();
    session_unset();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}
?>