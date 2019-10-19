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
?>
<?php
$select_addcart_tbl="SELECT * FROM `add_cart_tbl`";
$result_addcart=$conn->query($select_addcart_tbl);
while ($select_result=$result_addcart->fetch_array()) 
{
	 $pdt_price=$select_result[3];

    
	if (isset($_POST['update']))
     {	
     	$qty=$_POST['qty'];
     	 $total_price=$pdt_price*$qty;

	     $updt=$_POST['update'];
	   
	    $updat_row="UPDATE `add_cart_tbl` SET `total_price`='$total_price',`pdt_quantity`='$qty' WHERE `pdt_id`='$updt'";
	   $resut=$conn->query($updat_row);
	   if ($resut==true) 
	   {
	     echo "<script>alert ('cart updated')</script>";
	   }
	   else
	   {
	   	 echo "<script>alert ('cart is not updated')</script>";
	   }
    }
 
}

?>
<?php
if (isset($_POST['delete']))
{

	$del = $_POST['delete'];
	
 $delete_row="DELETE FROM `add_cart_tbl` WHERE `pdt_id`='$del'";
 $resut=$conn->query($delete_row);
 if ($resut==true) 
 {
 	echo "<script>alert('remove cart')</script>";
 }

}
?>
<?php
$final_total_price=0;
$query="SELECT * FROM `add_cart_tbl` WHERE `session_id`='$session_id' ";
$result=$conn->query($query);
while ($result_fetch=$result->fetch_array())
 {
	$final_total_price=$final_total_price+$result_fetch[5];
}
?>
<?php
if (isset($_POST['submit'])) 
{
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cheakout</title>
		
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<style>
     tr{
     	border-bottom: 1px solid black;
     }
	.table1{
		height: 45px;
        width: 50%;
        text-align: center;
        font-size: 20px;
       
	}
	.table2{
		height: 45px;
        width: 10%;
        text-align: center;
        font-size: 20px;
	}
		.table3{
		height: 45px;
        width: 10%;
        text-align: center;
        font-size: 20px;
	}
		.table4{
		height: 45px;
        width: 10%;
        text-align: center;
        font-size: 20px;
	}
		.table5{
		height: 45px;
        width: 40%;
        text-align: center;
        font-size: 20px;
	}
	td{
		padding-bottom: 15px;
		text-align: center;
	}
	.buttn{
	height: 44px;
    width: 20%;
    border-radius: 25px 25px 25px 25px;
    background:  #F8694A;
    color: white;
    float: right;
	}
	.buttn:hover{
		background-color: #30323A;
		color: white;
	}
	.shopping-cart-table>tbody>tr>.total {
    font-size: 18px;
    }

    .shopping-cart-table>tfoot>tr>.sub-total {
    font-size: 18px;
    }

   .shopping-cart-table>tfoot>tr>.total {
    font-size: 24px;
    color: #F8694A;
   }
</style>
<body>
	<?php include 'hedaer.php';?><br>
	
	
<div class="container">
	<div class="section-title" style="margin-top: 42px;">
		<h2 class="title">VIEW CART</h2>
	</div>
</div>
 <form action="" method="post">
 	<div class="container">
 	<table>
 		<tr>
 			<th class="table6"></th>
			<th class="table1">Product</th>
			<th class="table2">Price</th>
			<th class="table3">Quantity</th>
			<th class="table4">Total</th>
			<th class="table5">Action</th>
		</tr>
		<?php
			$query_addcart="SELECT * FROM `add_cart_tbl` WHERE `session_id`='$session_id'";
			$result_addcart=$conn->query($query_addcart);
			while ($fetch_result_addcart=$result_addcart->fetch_array()) 
			{
				$pro_id = $fetch_result_addcart[1];
				$pro_img = $pro_id."(0)";

				
			?>
		<tr>
			<form method="post">
			<td style="padding-bottom: 10px;"><img src="../pro-image/<?php echo $pro_img;?>.jpg" alt="" style="height: 60px; width: 50px; margin-top: 13px; margin-left: 10px;"></td>
			<td><h3 style="font-size: 18px;"><?php print $fetch_result_addcart[2]?></h3></td>
			<td><?php print $fetch_result_addcart[3]?></td>
			<td><input type="number" name="qty" value="<?php print $fetch_result_addcart[4]?>" style="text-align: center;"></td>
			<td><?php print $fetch_result_addcart[5]?></td>
			<td><button  type="submit" value="<?php print $fetch_result_addcart[1]?>" class="btn btn-primary" name="update">Update</button>||<button  type="submit" value="<?php print $fetch_result_addcart[1]?>" class="btn btn-danger" name="delete">Delete</button></td>

			</form>
		</tr>

		<?php
		}
		?>
		<tfoot>
			<tr>
				<th class="empty" colspan="3"></th>
				<th>SUBTOTAL</th>
				<th colspan="2" class="sub-total"><?php print $final_total_price?></th>
			</tr>
			<tr>
				<th class="empty" colspan="3"></th>
				<th>SHIPING</th>
				<td colspan="2">Free Shipping</td>
			</tr>
				<tr>
				<th class="empty" colspan="3"></th>
				<th>TOTAL</th>
				<th colspan="2" class="total"><?php print $final_total_price?></th>
			</tr>
		</tfoot>
 	</table><br>
 	<button class="buttn" type="submit" name="submit">Process Cheakout</button>
 </div>	<br>


 </form>
<?php include 'footer2.php';?>
</body>
</html>
