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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
 <!--    <link rel="stylesheet" href="../css/styl.css" type="text/css" media="all"> -->
</head>
<style>
  body
{
    margin: 0px;
    padding: 0px;
    font-family:system-ui;
    background: url(slider_img/signin.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
.box
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    padding: 40px;
    background: rgba(0,0,0,0.8);
    box-sizing: border-box;
    
}
.box h2
{
    text-align: center;
    color: white;
    
}
.box .inputBox
{
    position: relative;
}
.box .inputBox input
{
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    background: transparent;
}
.box .inputBox label
{
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: 0.5s;
}
.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label
{
    top: -19px;
    left:0;
    color: white;
    font-size: 14px;
}
.box input[type="submit"]
{
    background:transparent;
    border:none;
    outline: none;
    color: #000;
    background:white;
    padding: 10px 20px;
    cursor: pointer;
    
    
}
</style>

<body>
   <div class="box">
       <h2>Sign In</h2>
       <form>
           <div class="inputBox">
               <input type="text" name="" required="">
               <label>Your Email</label>
           </div>
           <div class="inputBox">
               <input type=password name="" required="">
               <label>Password</label>
           </div>
           <input type="submit" name="" value="Sign In">
       </form><br>
       <a style="color: white; text-decoration: none" href="signup.php">Create Account</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a style="color: white; text-decoration: none"  href="">Forget Password</a>
   </div>
    
</body>
</html>