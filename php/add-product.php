<?php
if(!isset($_SESSION)) 
   { 
        session_start(); 
    }
//$logInEmail = $_SESSION['email'];
//$loginfo=$_SESSION['loginfo'];
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
if (isset($_POST['submit']))
{
  $brand_name=$_POST['Brand_name'];
  $cat_name=$_POST['cat_name'];
  $id=$_POST['pro_id'];
  $name=$_POST['pro_name'];
  $code=$_POST['pro_code'];
  $quantity=$_POST['pro_quantity'];
  $price=$_POST['pro_price'];
  $details=$_POST['product_details'];
  $onformation=$_POST['product_information'];
  $img_name='image';
  $image_count=($_FILES[$img_name]['tmp_name']);
  $insert_pdt="INSERT INTO `pdt_tbl`(`brand_name`, `cat_name`, `pdt_id`, `pdt_name`, `pdt_code`, `pdt_quantity`, `pdt_price`, `pdt_details`, `pdt_information`) VALUES ('$brand_name','$cat_name','$id','$name','$code','$quantity','$price','$details','$onformation')";
  $result_pdt=$conn->query($insert_pdt);
  if ($result_pdt==true) 
  {
    if ($conn->affected_rows >0)
    {
       
        for ($i=0;$i<count($image_count); $i++) 
        { 
          $image_name=$id."($i)";
          $image_location="../pro-image/$image_name.jpg";
          move_uploaded_file($image_count[$i],$image_location);
        }
        echo "<script>alert('Data added')</script>";
    }
    else
    {
      echo "<script>alert('Data is not added')</script>";
    }
  }
  else
  {
    echo "<script>alert('query error')</script>";
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
<body>
  <div class="header" style="height: 50px; width: 100%;background-color: #627271; ">
  <h3 style="padding-left:30%;color:white;font-family: monospace;letter-spacing: 3px;">ADD PRODUCT</h3>
  <br>

  </div>
   <div class="product" style="height:auto; width: 50%; background-color:bisque; margin-top: 75px;">
               
        <form action="" method="post" enctype="multipart/form-data">
          <label>Brand Name:</label><br>
              <select type="text"  name="Brand_name" class="form-control" placeholder="">
              <?php
              $query_item="SELECT * FROM `Add_item`";
              $result_item=$conn->query($query_item);
             
              while ( $fetch_result_item=$result_item->fetch_array()) {
                # code...
              
              ?>
                <option hidden="">Choise Brand</option>
                <option><?php print $fetch_result_item[1]?></option>
               <?php
                }
               ?>
              </select>
              <label>catagory Nmae:</label><br>
              <select type="text"  name="cat_name" class="form-control" placeholder="">
                <?php
                $query_cat="SELECT * FROM `Add_catagory`";
                $query_result=$conn->query($query_cat);
                while ($fetch_result_cat=$query_result->fetch_array()) 
                {
                 
             
                ?>
                <option hidden="">Chose Item</option>
                <option><?php print $fetch_result_cat[1] ?></option>
                <?php
                     }
                ?>
              </select>
              <label>Product Id:</label><br>
              <input type="number" name="pro_id" class="form-control"><br>
              <label>Product Name:</label><br>
              <input type="text" name="pro_name" class="form-control"><br>
              <label>Product Code:</label>
              <input type="text" name="pro_code" class="form-control"><br>
              <label>Product Quantity:</label><br>
              <input type="number" name="pro_quantity" class="form-control"><br>
              <label>Product price:</label>
              <input type="number" name="pro_price" class="form-control"><br>
              <label>Product Details:</label>
              <textarea name="product_details" rows="5" placeholder="Product details" class="form-control"></textarea><br>
              <label>Product Information:</label>
               <textarea name="product_information" rows="5" placeholder="Product informaition" class="form-control"></textarea><br>
               <input type="file" class="form-control" name="image[]"><br>
               <input type="file" class="form-control" name="image[]"><br>
               <input type="file" class="form-control" name="image[]"><br>
               <input type="file" class="form-control" name="image[]"><br>
             <button style="float: right;" type="submit" name="submit" class="btn btn-success">Add Product</button>
        </form>
            
        </div>
     </div>
    
</body>
</html>
