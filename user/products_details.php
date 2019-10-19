<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
 $session_id=session_id();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="E-Com";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
$act_value=$_GET['act_value'];
?>
<?php
//select data for insert add cart table
$query="SELECT * FROM `pdt_tbl` WHERE `pdt_id`='$act_value'";
$query_result=$conn->query($query);
while ($query_fetch_result=$query_result->fetch_array()){
	$brand_name=$query_fetch_result[0];
	$pro_name=$query_fetch_result[3];
	$pro_price=$query_fetch_result[6];
	$pro_details=$query_fetch_result[7];
	if (isset($_POST['add_cart'])) 
 {
	$pdt_quantity=$_POST['qntity'];
	$total_price=$pdt_quantity*$pro_price;
	$insert_add_cart="INSERT INTO `add_cart_tbl`(`session_id`, `pdt_id`, `pdt_name`, `pdt_price`, `pdt_quantity`, `total_price`, `pdt_details`, `brand_name`) VALUES ('$session_id','$act_value','$pro_name','$pro_price','$pdt_quantity','$total_price','$pro_details','$brand_name')";
	$result_add_cart=$conn->query($insert_add_cart);
	if ($result_add_cart==true) 
	{
		if ($conn->affected_rows>0) 
		{
			echo "<script>alert('Data added into addcart ')</script>";
		}
		else
		{
		 echo "<script>alert('Data is not added into addcart ')</script>";
		}
	}
 }




} 

			



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>products-details</title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet"> -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
	<?php include 'hedaer.php';?><br>
	
<form action="" method="post">
		<div class="section">
	
		<div class="container">
	
			<div class="row">
				<?php
					$query="SELECT * FROM `pdt_tbl` WHERE `pdt_id`='$act_value'";
					$query_result=$conn->query($query);
					while ($query_fetch_result=$query_result->fetch_array()) 
					{	

						$pro_id = $query_fetch_result[2];
						$pro_img = $pro_id."(0)";
						$pro_img1 = $pro_id."(1)";
						$pro_img2 = $pro_id."(2)";
					
				
				?>
		
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img;?>.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img1;?>.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img2;?>.jpg" alt="">
							</div>
						<!-- 	<div class="product-view">
								<img src="./img/main-product04.jpg" alt="">
							</div> -->
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img;?>.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img1;?>.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="../pro-image/<?php echo $pro_img2;?>.jpg" alt="">
							</div>
							<!-- <div class="product-view">
								<img src="./img/thumb-product04.jpg" alt="">
							</div> -->
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
					
							<h2 class="product-name"><?php print $query_fetch_result[3] ?></h2>
							<h3 class="product-price">$<?php print $query_fetch_result[6] ?> </h3>
						
							<p><strong>Availability:</strong> In Stock</p>
							<p><strong>Brand:</strong><?php print $query_fetch_result[0] ?> </p>
							<p><?php print $query_fetch_result[7]?></p>
						

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QUANTITY: </span>
									<input class="input" type="number" name="qntity">
								</div>
								<?php
							}
								?>
								<button class="primary-btn add-to-cart" name="add_cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab1">Details</a></li>
								<li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>

								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>
			
		</div>
	
	</div>
</form>
	<?php include 'footer2.php';?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>