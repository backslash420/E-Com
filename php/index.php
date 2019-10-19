<?php
if(!isset($_SESSION)) 
   { 
        session_start(); 
    }
error_reporting(0);
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
 $email=$_POST['email'];
 $pass=$_POST['password'];


 
 $select_data_from_signin_tbl="SELECT * FROM `Admin_signin`  WHERE `Admin-email`='$email' && `password`='$pass'";
 $result=$conn->query( $select_data_from_signin_tbl);
 $select_all_data_from_signin_tbl=$result->fetch_array();
 if ($email==$select_all_data_from_signin_tbl[0] && $pass=$select_all_data_from_signin_tbl[1]) 
 {
 
  //$_SESSION['loginfo']=true;
  $update="UPDATE `Admin_signin`SET `Active-status`='1' WHERE `Admin-email`='$email'";
  $result=$conn->query($update);
  $_SESSION['email']=$email;
   header('location:home_main.php');
 }
 else{
   // "UPDATE `Admin_signin` SET `Active-status`='0' WHERE `Admin-email`='$email'";
   //  $result=$conn->query($update);
   //  $result==true;
  echo "<script>alert('Please Login First')</script>";

 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin SignIn</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">

</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="header" style="height: 50px; width: 100%;margin-top:86px;background-color: #627271; box-shadow:3px 3px 5px 5px #627271">
          <h3 style="padding-left:36%;padding-top:16px;color:white;font-family: monospace;letter-spacing: 3px; ">ADMIN LOGIN</h3>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
           <div class="Login" style="height:250px;  background-color:bisque; margin-top:10px;box-shadow:3px 3px 5px 5px bisque;">
               
            <form action="" method="POST">
              <label style="padding-top: 40px; ">Email</label><br>
              <input type="text" name="email" class="form-control" placeholder="Enter your Email"><br>
              <label>Password</label><br>
              <input type="text" name="password" class="form-control" placeholder="Enter Your Password"><br>
              <button style="float: right;" type="submit" name="submit" class="btn btn-success">Login</button>
              <!-- <a href="index.php?&&page=sign_up" style="text-decoration: none; color: black">Create Account</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <a href="index.php?&&page=forget" style="text-decoration: none; color: black">Forget Password</a> -->
            </form>
            
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>


    
</body>
</html>
