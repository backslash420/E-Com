<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   $session_id=session_id();
   error_reporting(0);
  $email=$_SESSION['email'];
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
	<title>header</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<style>
		.header{
		height: 80px;
		width: 100%;
		background-color: #000033;
		overflow-x: hidden;
		position: fixed;
		z-index: 999;

	}
	.box{
		width: 100%;
		padding-top: 6px;
	}
   input{
   	display: inline-block;
   box-sizing: border-box;
   transition: 0.5s;
   }
   input[type="text"]{
	width: 57%;
   	height: 40px;
   	padding: 0 25px;
   	border: none;
   	outline: none;
   	border-radius: 25px 0 0 25px;
   	
   }
   input[type="submit"]{
   	width: 23%;
   	height: 40px;
   	border-radius:0 25px 25px 0;
    border: none;
   	outline: none;
   	cursor: pointer;
   	background-color: #F8694A;;
   	color: black;
   }
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="header">
				
				<div class="col-md-2">
					<div class="logo">
						<a href="home_main.php"><h1 style="color: white; font-size: 45px; font-family:serif; padding-top: 15px"><span style="color: #F72395;">E-</span>com</h1></a>
					</div>
				</div>
		<!-- 		<div class="col-md-1"></div> -->
				<div class="col-md-4">
					<<div class="box">
						<form action="">
							<input type="text" name="srch" placeholder="Search.....">
							<input type="submit" name="submit" value="SEARCH">
						</form>
					</div>
				
				</div>
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-2">
							<div class="cart" style="height: 40px; width: 40px;  margin-top: 20px;padding-top: 5px;padding-left: 8px; font-size: 26px;">
					  <i class="fa fa-shopping-cart" style="color: white;"></i>
					
					

					</div>
						</div>
						<div class="col-md-10">
							<?php
							$count=0;
							$select_data_from_addcart="SELECT * FROM `add_cart_tbl` WHERE `session_id`='$session_id'";
							$result_addcart=$conn->query($select_data_from_addcart);
							while ($fetch_result_addcart=$result_addcart->fetch_array())
							 {
								$count++;
							}
							?>
							<div class="cart-header">
								<h4 style="padding-top: 30px;"><a href="cheackout.php" style="text-decoration: none; color: white;font-size: 15px; font-family:  system-ui; margin-left: 8px;">My Cart(<?php print $count?>) <i class="fa fa-caret-down"></i></a></h4>
							</div>
							<?php

								// }
							
							?>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-4">
							<div class="profile" style="height: 50px; width: 50px; background-color: #ccc; border-radius: 100%; margin-top: 20px;">
								<img src="img/banner01.jpg"alt="" style="height: 50px;width: 50px;border-radius: 100%;">
							</div>
						</div>
						<?php
						// $query="SELECT * FROM `Admin_signup` WHERE `admin-email`='$email'";
						// $result=$conn->query($query);
						// while ($result_fetch=$result->fetch_array()) {
							
				

						?>
						<div class="col-md-8">
							<div class="prfl-name">
						<a href=""><h3 style="color: white; font-size: 17px;padding-top: 30px; font-family:  system-ui;">Ahmed Riad</h3></a>
					   </div>
					   <?php
					   		// }
					   ?>
					</div>
					</div>
					
				</div>
				<div class="col-md-2">
					<div class="row">
						<div class="my-account">
							<div class="col-md-2">
								<div class="prfl" style="height: 40px; width: 40px;  margin-top: 20px;padding-top: 5px;padding-left: 8px; font-size: 26px; float: left;">
							<i class="fa fa-user-o" style="color: white; text-align: center;"></i>
							
						</div>
							</div>
							<div class="col-md-10">
								
					            <div class="account1" style="float:left;">
					            	<?php
					            	 if ($_SESSION['loginfo']==true) 
					            	 {
					                ?>
							    <h4 style="padding-top: 30px"><a href="sign_in.php" style="text-decoration: none; color: white;font-size: 17px; font-family:  system-ui; margin-left: 8px;">Login</a></h4>
							    <?php
							         }
							         else
							         {
							    ?>
							 	<h4 style="padding-top: 30px"><a href="sign_in.php" style="text-decoration: none; color: white;font-size: 17px; font-family:  system-ui; margin-left: 8px;">Login</a></h4>
							 	<?php
							 		}
							 	?>
						 		 </div>
			
							</div>
						
					   </div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	<?php include 'menu.php';?>
</body>
</html>