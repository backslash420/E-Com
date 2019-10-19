<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$logInEmail = $_SESSION['email'];
$loginfo=$_SESSION['loginfo'];
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
if (isset($_POST['logout']))
 {
      $update="UPDATE `Admin_signin` SET `Active-status`='0'";
       $result=$conn->query($update);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/fontawesome.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/fontawesome.min.css" type="text/css" media="all">
</head>
<style>
    *{
        margin: 0px auto;
        padding: 0px;
        box-sizing: border-box;
    }
    .header{
        height: 75px;
        width: 100%;
        background-color: #000033;
        position: fixed;
        overflow-x: hidden;
        z-index: 999;
    
     
    }
    .logo {
        float: left;
      
    }
     .logo h1{
        color:white;
        font-family:Comic Sans MS
    }
    .logo span{
        color: #F72395;
    }
    .srch-btn {
         margin-top: 16px;
         float: left;
    }
    .srch-btn input{
        height: 35px;
        width: 200px;
        color: white;
        border: 1px solid #F72395;
      
    }
    .srch-btn input:focus{
        width: 260px;
    }
    .profile{
        height: 5px;
       
        background-color:#F72395;
        border-radius: 100%;
        float: left;
        margin-top: 13px;
        float: left;
 
    }
    .prfl-name {
        float: left;
    }
    .prfl-name h3{
        font-size: 18px;
        color: white;
        font-family: monospace;
        padding-top: 10px;
    }
    .login-btn{
          float: right;

    }
     .login-btn button{
        float: right;
        margin-top: 15px;
        font-size: 20px;
        font-family: monospace;
        text-align: center;
    }
    .menu-content{
        height: 550px;
        width: 100%;
    }
 
    .main-content{
        height: auto;
        width: 80%;
        overflow-y: hidden;
        float: right;
  
        margin-top: 75px;

    }
    .main-nav{
        height: 550px;
        width: 20%;
        background: #000033;
        position: fixed;
        overflow-x: hidden;
        margin-top: 75px;
        border-top: 1px solid #F72395;
       

       }
    .main-nav a{
        display: block;
        padding: 10px 0px 10px 20px;
        color: white;
        border-bottom: 1px solid black;
        text-decoration: none;
        font-size: 17px;
        font-family: Comic Sans MS;



    }
    .main-nav a:hover{
        background-color: #F72395;
        text-decoration: none;
        transition:0.5s;
        color: black;
    }
    .main-nav-ul{
        list-style: none;
    }
    .main-nav-ul ul{
        display: none;
        list-style: none;
    }
    .main-nav-ul ul a:before{
        content: '\203A';
    }
    .main-nav-ul li:hover ul{
        display: block;
        background-color: #000033;
        list-style: none;
    }
    .main-nav .sub-arrow:after{
        content: '\203A';
        float: right;
        margin-right: 20px;
        transform: rotate(90deg);
    }
    .main-nav li:hover .sub-arrow:after{
        content: '\2039';
    }

    
</style>
<body>
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:index.php?&&page=sign_in');
    }

    ?>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-md-2 logo">
                  <h1><span>E-</span>com</h1>
            </div>
      
           
            <div class="col-md-3"></div>
            <div class="col-md-3 srch-btn">
                <input class="search-text" type="text" name="" placeholder="Type to search">
            </div>
             
                
           <div class="col-md-1" style="width: 5px;">
           
            </div>
           
           
            <div class="col-md-2 prfl-name">
                <?php
                $select_data_from_signin_tbl="SELECT * FROM `Admin_signin`";
                $result=$conn->query( $select_data_from_signin_tbl);
                
                    while ( $value=$result->fetch_array()) 
                    {
                        if ($value[2]==1) {
                            
                       
                ?>
                <h3><?php print $value[3]?></h3>
                <?php
                 }

                    }
                ?>
               
            </div>
             <?php

                    if ($_SESSION['loginfo']=true;) 
                    {
                        # code...
                   

                ?>
            <div class="col-md-1 login-btn">
                <form action="" method="post">
                 <button type="submit" name="logout" class="btn btn-success">Logout</button> 
             </form>
                
             <!--   <a href="index.php"></a> -->
              
          
            </div>
            <?php
                }

            ?>
            <?php

                else
                {

            ?>


              <div class="col-md-1 login-btn">
                <form action="" method="post">
                 <button type="submit" name="logout" class="btn btn-success">Login</button> 
             </form>
                
             <!--   <a href="index.php"></a> -->
              
          
            </div>
            <?php
                }

            ?>
        </div>
    </div>
   <div class="menu-content">
      <nav class="main-nav" >
        
        <ul class="main-nav-ul">
            <li><a href="home_main.php?&&page=welcome">Home</a></li>
            
            <li><a href="">Brand<span class="sub-arrow"></span></a>
                <ul>
                    <li><a href="home_main.php?&&page=item">Add Brand</a></li>
                    <li><a href="">View Brand</a></li>


                </ul>
            </li>
            <li><a href="">Catagory <span class="sub-arrow"></span></a>
                <ul>
                    <li><a href="home_main.php?&&page=catagory">Add catagory</a></li>
                    <li><a href="home_main.php?&&page=view-catagory">View catagory</a></li>


                </ul>
            </li>
            <li><a href="">Products <span class="sub-arrow"></span></a>
                <ul>
                    <li><a href="home_main.php?&&page=product">Add product</a></li>
                    <li><a href="home_main.php?&&page=view-product">View product</a></li>
                    <li><a href="home_main.php?&&page=view-details">Details products</a></li>

                </ul>
            </li>
            <li><a href="">Slider <span class="sub-arrow"></span></a>
                <ul>
                    <li><a href="">Add slider</a></li>
                    <li><a href="">View product</a></li>
                </ul>
            </li>
            <li><a href="">Admin <span class="sub-arrow"></span></a>
                <ul>
                    <li><a href="">Add admin</a></li>
                    <li><a href="">View admin</a></li>
                     <li><a href="">Active admin</a></li>

                </ul>
            
            </li>
            <li><a href="">Customer Deatils</a></li>
            <li><a href="">Sell Details</a></li>
            <li><a href="">About Us</a></li>
        </ul>
    </nav>
     <div class="main-content">
         <?php
         
         
            switch ($_GET['page']) {
            case 'catagory':
                include "add-catagory.php";
                break;
            case 'view-catagory':
                include "add-catagory.php";
                break;
            case 'product':
               include "add-product.php";
                break;
            case 'item':
               include "add-item.php";
                break;
            case 'view-product':
                include "view-product.php";
                break;
            case 'view-details':
                include "view-details-pro.php";
                break;
            case 'pro-details':
                include "pro-details.php";
                break;
            case 'pro_edit':
                include "pro_edit.php";
                break;
            // case 'sign_in':
            //     include "admin_sign_in.php";
            //     break;
            // case 'sign_up':
            //     include "admin_signup.php";
            //      break;
            // case 'forget':
            //     include "forgate-pass.php";
            //     break;
            
                default:
                include "welcome.php";
                
                
                break;
        }
         
        
     ?>  
   </div>
  
</body>
</html>