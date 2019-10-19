<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
<!-- 		<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet"> -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<!-- 	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" /> -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- 	<link type="text/css" rel="stylesheet" href="css/style.css" /> -->

</head>
<style>

   .menu-bar{
   	height: 60px;
   	width: 100%;
   	background-color:#000033;
   	border-top: 1px solid  #ccc;

   	}
	.menu{

	}
	.list{
		height: 60px;
		width: 20%;
	/*	border-right: 1px solid black;*/
		text-align: center;
		padding-top: 15px;
		cursor: pointer;

	}
	.menu ul{

	}
	.menu ul li{
		list-style: none;
		float: left;


	}
 	.menu ul li a{
 		text-decoration: none;
 		color: white;
 		font-family: system-ui;

	}
  	.menu ul li a:hover{
  		color:#ccc;
  	}
  	.dropdown-content{
  		display:none;
  	}
  	.lis:hover .dropdown-content{
  		display: block;
  	}
</style>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="menu-bar">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="menu">
					<ul>
						<li class="list"><a href="home_main.php">HOME</a></li>
						<li class="list"><a href="">CATAGORY <i class="fa fa-caret-down"></i></a></li>
			   			<li class="list"><a href="">SERVICES</a></li>
						<li class="list"><a href="">CONTACT</a></li>
						<li class="list"><a href="">ABOUT US</a></li>
					</ul>
					</div>
					
				</div>
				
				<div class="col-md-2"></div>
				
			</div>
		</div>
	</div>
</body>
</html>















