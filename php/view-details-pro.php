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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>view product</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
</head>
<style>
*{
	margin: 0px auto;
	padding: 0px;
}
.table{
	height:auto;
	width: 90%;
	border: 1px solid black;
	text-align: center;
	margin-top: 75px;
	}
	table{

		width:100%;
		padding-top: 20px;
	/*	border-bottom: 1px solid black;*/

	}
	th{
		height: 45px;
		border-bottom: 1px solid black;
		text-align: center;
	}
	td{
		border-bottom: 1px solid black;''
	}
	img{
	height: 60px;
    width: 50px;
	}
</style>
<body> 
	<div class="header" style="height: 50px; width: 100%; background-color:#627271;">
		<h3  style="padding-left:30%;/*padding-top:15px;*/color:white;font-family: monospace;letter-spacing: 3px; ">VIEW DETAILS</h3>
	</div>
	<div class="table">
		<table>
		<tr>
			<th>Product Name</th>
			<th>Product Code</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		<?php
			$query_pdt_tbl="SELECT * FROM `pdt_tbl`";
			$result_pdt_tbl=$conn->query($query_pdt_tbl);
			while ($fetch_result_pdt_tbl=$result_pdt_tbl->fetch_array())
			 {
				
			$pro_id = $fetch_result_pdt_tbl[2];
			$pro_img = $pro_id."(0)";
		
		?>
		<tr>

			<td><?php print $fetch_result_pdt_tbl[3]?></td>
			<td><?php print $fetch_result_pdt_tbl[4]?></td>
			<td><?php print $fetch_result_pdt_tbl[5]?></td>
			<td><?php print $fetch_result_pdt_tbl[6]?></td>
			<td><img src="../pro-image/<?php echo $pro_img;?>.jpg" alt=""></td>
			<td><a href="home_main.php?&&page=pro-details"><button type="button" class="btn btn-info">Details</button></a></td>
			
		</tr>
		<?php
					}
			?>
	</table>
	</div>
</body>
</html>