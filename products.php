<?php

session_start();
require_once("php/dbcontroller.php");
require_once("php/component.php");

$db_handle = new DBController();

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $product = $db_handle->runQuery("SELECT * FROM `product_tb` WHERE product_id = '$id'");

	if (count($product) == 1 ) {
        foreach($product as $key=>$value){  
		//$n = mysqli_fetch_array($record);
        // $n = $record->fetch();
            $brand = $product[$key]['product_brand'];
            $name = $product[$key]['product_name'];
            $size = $product[$key]['product_size'];
            $condition = $product[$key]['product_condition'];
            $price = $product[$key]['product_price'];
            $color = $product[$key]['product_color'];
            $material = $product[$key]['product_material'];
            $category = $product[$key]['product_category'];
        }
        
        echo ' <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#edit").modal("show");
            });
            </script>';
        

        // echo "<script>
        //     document.getElementById('edit1').modal('show');
        //     </script>";
	}
}


if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$brand = $_POST['brand'];
	$name = $_POST['name'];
	$size = $_POST['size'];
    $condition = $_POST['condition'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $material = $_POST['material'];
    $category = $_POST['category'];

    $db_handle->runQuery("UPDATE `product_tb` SET product_brand='$brand', product_name='$name', product_size='$size', 
    product_condition='$condition', product_price='$price', product_color='$color', product_material='$material', product_category='$category'  WHERE product_id='$id'");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
    $db_handle->runQuery("DELETE FROM `product_tb` WHERE product_id = '$id'");
}
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $("#edit1").modal("show");
            });
    </script> -->
</head>
<body>
    <!-- All Products -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Product List</h2>   
            <div class="d-flex flex-wrap justify-content-center">
            <table>
                <thead>
                    <tr>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Condition</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Category</th>
                    <th colspan="2">Action</th>
                    </tr>
                </thead>
                
                <?php 
                $product_array = $db_handle->runQuery("SELECT * FROM `product_tb` ORDER BY product_id");
                if (!empty($product_array)) {
                    foreach($product_array as $key=>$value){  
                ?>
                    <tr>
                        <td><?php echo $product_array[$key]["product_brand"]; ?></td>
                        <td><?php echo $product_array[$key]["product_name"]; ?></td>
                        <td><?php echo $product_array[$key]["product_size"]; ?></td>
                        <td><?php echo $product_array[$key]["product_condition"]; ?></td>
                        <td><?php echo $product_array[$key]["product_price"]; ?></td>
                        <td><?php echo $product_array[$key]["product_color"]; ?></td>
                        <td><?php echo $product_array[$key]["product_material"]; ?></td>
                        <td><?php echo $product_array[$key]["product_category"]; ?></td>
                        <td>
                            <!-- class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit" -->
                            <a href="products.php?edit=<?php echo $product_array[$key]["product_id"]; ?>" class="text-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            
                        </td>
                        <td>
                            <a href="products.php?delete=<?php echo $product_array[$key]["product_id"]; ?>" class="text-danger"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                <?php
                    } 
                } 
                ?>
            </table>
            </div>
        </div>
    </section>
    

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="products.php" >
                    <div class="mb-3">
                        <label for="brand" class="col-form-label">Brand:</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $brand; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="col-form-label">Size:</label>
                        <input type="text" class="form-control" id="size" name="size" value="<?php echo $size; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="condition" class="col-form-label">Condition:</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="<?php echo $condition; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="col-form-label">Color:</label>
                        <input type="text" class="form-control" id="color" name="color" value="<?php echo $color; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="material" class="col-form-label">Material:</label>
                        <input type="text" class="form-control" id="material" name="material" value="<?php echo $material; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="col-form-label">Category:</label>
                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </form>
            </div>
            
        </div>
        </div>
    </div>



    <?php
    footer();
    
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
