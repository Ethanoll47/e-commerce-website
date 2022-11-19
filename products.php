<?php // authenticate3.php
session_start();		

require_once ("php/dbcontroller.php");
$database = new DBController();
require_once("php/component.php");
require_once("php/config.php");

// $deleteQuery = "";
// $id = (isset($_POST['id']) ? $_POST['id'] : '');

// if(isset($_GET['delete']) && $_GET['delete'] == true){
//   $deleteQuery = "DELETE FROM `product_tb` WHERE product_id = '$id'";
//   $result = $pdo->query($deleteQuery);
//   return $result;
// }
?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thrifted</title>  
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" /> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  
<script>
$(document).ready(function(){
 
 load_data();

 function load_data(query1)
 {
  $.ajax({
   url:"php/fetchProduct.php",
   method:"POST",
   data:{query:query1},
   dataType:"json",
   success:function(data)
   {
    $('#total_records').text(data.length);
    var html = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      html += "<form action='products.php' method='post'>";
      html += '<tr>';
      html += "<td name='id'>"+data[count].product_id+"</td>";
      html += '<td>'+data[count].product_brand+'</td>';
      html += '<td>'+data[count].product_name+'</td>';
      html += '<td>'+data[count].product_size+'</td>';
      html += '<td>'+data[count].product_condition+'</td>';
      html += '<td>'+data[count].product_price+'</td>';
      html += '<td>'+data[count].product_color+'</td>';
      html += '<td>'+data[count].product_material+'</td>';
      html += '<td>'+data[count].product_category+'</td>';
      html += "<td><button type='submit' class='btn btn-dark btn-lg mt-3 mb-3' name='edit' id='edit'>Edit</button></td>";
      html += "<td><button type='submit' class='btn btn-dark btn-lg mt-3 mb-3' name='delete' id='delete'><a href='products.php?delete=true'>Delete</button></td>";
      html += '</tr>';
      html += "</form>";
     }
    }
    else
    {
     html = '<tr><td colspan="5">No Data Found</td></tr>';
    }
    $('tbody').html(html);
   }
  })
 }

  $('#search').click(function(){
    var query1 = $('#tags').val();
    load_data(query1);
  });

  $("#tags").change(function(){
    var query1 = $('#tags').val();
    load_data(query1);
  });

});
</script>
  
  <style>
  .bootstrap-tagsinput {
   width: 100%;
  }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <br />
   <h2 align="center">Product List</h2><br />
   <div class="form-group">
    <div class="row">
     <div class="col-md-10">
      <input type="text" id="tags" class="form-control" data-role="tagsinput" />
     </div>
     <div class="col-md-2">
      <button type="button" name="search" class="btn btn-primary" id="search">Search</button>
     </div>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <div align="right">
     <p><b>Total Records - <span id="total_records"></span></b></p>
    </div>
    <table class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Brand</th>
       <th>Name</th>
       <th>Size</th>
       <th>Condition</th>
       <th>Price</th>
       <th>Color</th>
       <th>Material</th>
       <th>Category</th>
       <th></th>
       <th></th>
      </tr>
     </thead>
     <tbody>
     </tbody>
    </table>
   </div>
  </div>
  <div style="clear:both"></div>
  <br />
  
  <br />
  <br />
  <br />
 </body>
</html>
