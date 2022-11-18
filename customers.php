<?php // authenticate3.php
session_start();		

require_once ("php/dbcontroller.php");
$database = new DBController();
require_once("php/component.php");

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thrifted</title>  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
  
<script>
$(document).ready(function(){
 
 load_data();

 function load_data(query1)
 {
  $.ajax({
   url:"php/fetch.php",
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
      html += '<tr>';
      html += '<td>'+data[count].first_name+'</td>';
      html += '<td>'+data[count].last_name+'</td>';
      html += '<td>'+data[count].address+'</td>';
      html += '<td>'+data[count].postcode+'</td>';
      html += '<td>'+data[count].city+'</td>';
      html += '<td>'+data[count].state+'</td></tr>';
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
   <h2 align="center">Customer List</h2><br />
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
       <th>First Name</th>
       <th>Last Name</th>
       <th>Address</th>
       <th>Postcode</th>
       <th>City</th>
       <th>State</th>
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
