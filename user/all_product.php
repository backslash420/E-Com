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
	<title>All product</title>
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
	<?php include 'hedaer.php';?><br>
		<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Product For You</h2>
					</div>
				</div>
				<?php
					$query="SELECT * FROM `pdt_tbl`";
					$query_result=$conn->query($query);
					while ($query_fetch_result=$query_result->fetch_array()) 
					{
						$pro_id = $query_fetch_result[2];
						$pro_img = $pro_id."(0)";
				
				?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb" style="border:1px solid #000033;">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="../pro-image/<?php echo $pro_img;?>.jpg" alt="" style="height: 264px;">
						</div>
						<div class="product-body">
							<h3 class="product-price">$<?php print $query_fetch_result[6] ?></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href=""><?php print $query_fetch_result[3] ?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>

		</div>

	</div>
		<?php include 'footer2.php';?>
</body>
</html>