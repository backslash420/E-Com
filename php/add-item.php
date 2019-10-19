<?php
if(!isset($_SESSION)) 
   { 
        session_start(); 
    }
  
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

if (isset($_POST['add_item']))
{
  $id=$_POST['id'];
  $name=$_POST['item_name'];
  $insert="INSERT INTO `Add_item`(`Id`,`Name`) VALUES ('$id','$name')";
  $insert_result=$conn->query($insert);
  if ($insert_result==true) 
  {
    if ($conn->affected_rows>0) 
    {
      echo "<script>alert('Data added')</script>";
    }
    else{
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
  <h3 style="padding-left:30%;color:white;font-family: monospace;letter-spacing: 3px; ">ADD Brand</h3>
  <br>
  
  </div>
   <div class="item" style="height: 250px; width: 50%; background-color:bisque; margin-top: 75px;">
               
          <form action="" method="post">
              <label style="padding-top: 40px; ">Brand Id:</label><br>
              <input type="number" name="id" class="form-control"><br>
              <label>Brand Name:</label><br>
              <input type="text" name="item_name" class="form-control"><br>
              <button style="float: right;" type="submit" name="add_item" class="btn btn-success">Add Brand</button>
          </form>
            
        </div>
     </div>
</body>
</html>