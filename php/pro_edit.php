00<?php
if(!isset($_SESSION)) 
   { 
        session_start(); 
    }
  $act_value = $_GET['act_value'];
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="E-Com";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
?>
<?php
if (isset($_POST['Pro_edit'])) 
{
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

$update_pdt_tbl="UPDATE `pdt_tbl` SET `pdt_name`='$name',`pdt_quantity`='$quantity',`pdt_price`='$price' WHERE `pdt_id`='$act_value'";
$update_pdt_result=$conn->query($update_pdt_tbl);
if ($update_pdt_result==true) 
{
  echo "<script>alert('Data Updated')</script>";
}
else
{
   echo "<script>alert('Data Not Updated')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Catagory</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
</head>
<style>
  a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #ddd;
    color: black;
    text-decoration: none;
}

.previous {
/*    background-color: #f1f1f1;*/
     background-color: #627271;;
    color: white;
}

.next {
    background-color: #4CAF50;
    color: white;
}

.round {
    border-radius: 50%;
}
</style>
<body>
<div class="header" style="height: 50px; width: 100%;background-color: #627271; ">
  <h3 style="padding-left:30%;color:white;font-family: monospace;letter-spacing: 3px; ">Edit Product </h3>
  <br>
  
</div>
  
 <div  class="Edit_pro" style="height: 315px; width: 50%; background-color:bisque; margin-top: 75px;">
               
          <form action="" method="post">
              <label style="padding-top: 40px; ">Product Name:</label><br>
              <input type="text" name="name" class="form-control"><br>
              <label>Product Quantity:</label><br>
              <input type="number" name="quantity" class="form-control"><br>
                <label>Product Price:</label><br>
              <input type="number" name="price" class="form-control"><br>
              <button style="float: right;" type="submit" name="Pro_edit" class="btn btn-success">Edit Product</button>
          </form>
            
        </div>
        <a href="home_main.php?&&page=view-product" class="previous">&laquo; Previous</a>
     </div>
</body>
</html>
<!-- // -->