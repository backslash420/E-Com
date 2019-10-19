<?php
    // if(!isset($_SESSION)) 
    // { 
    //     session_start(); 
    // } 
?>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname="E-Com";
// $conn = new mysqli($servername, $username, $password);
// $conn->select_db($dbname);
?>
<?php
// if (isset($_POST['submit'])) 
// {
//  $email=$_POST['email'];
//  $pass=$_POST['password'];
//  $select_data_from_signup_tbl="SELECT * FROM `Admin_signup` WHERE `Admin-email`='$email'";
//  $result=$conn->query( $select_data_from_signup_tbl);
//  $select_all_data_from_signup_tbl=$result->fetch_array();
//  if ($email==$select_all_data_from_signup_tbl[1] && $pass=$select_all_data_from_signup_tbl[6])
//   {
//      //  $_SESSION['loginfo']=true;
//      //  $_SESSION['email']=$email;
//      // //  // $_SESSION['Active-status']=1;
//      // //  echo "OKKK";

//      // //  echo "<script>window.location='index.php';</script>";
//      // header('location:index.php');

//   }
//   else
//   // {
//   //   echo "nott";
//     //echo "<script>window.alert('Your info is not correct')</script>";
//   }
  
// }


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
  <h3 style="padding-left:36%;color:white;font-family: monospace;letter-spacing: 3px; ">ADMIN LOGIN</h3>
  <br>
  
  </div>
   <div class="Login" style="height:250px; width: 50%; background-color:bisque; margin-top: 75px;">
               
            <form action="" method="POST">
              <label style="padding-top: 40px; ">Email</label><br>
              <input type="text" name="email" class="form-control" placeholder="Enter your Email"><br>
              <label>Password</label><br>
              <input type="text" name="password" class="form-control" placeholder="Enter Your Password"><br>
              <button style="float: right;" type="submit" name="submit" class="btn btn-success">Login</button>
              <a href="index.php?&&page=sign_up" style="text-decoration: none; color: black">Create Account</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <a href="index.php?&&page=forget" style="text-decoration: none; color: black">Forget Password</a>
            </form>
            
        </div>
     </div>
    
</body>
</html>
