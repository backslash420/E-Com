<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="E-Com";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
?>
<?php
if (isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$nmbr=$_POST['number'];
$address=$_POST['address'];
$district=$_POST['district'];
$gender=$_POST['gender'];
$pass=$_POST['password'];
$c_pass=$_POST['c_password'];
  $img_name='image';
  $image=($_FILES[$img_name]['tmp_name']);
// $image = addslashes($image);
// $img = file_get_contents($image);
// $img = base64_encode($img);
if (!empty($name) && !empty($email) && !empty($nmbr) && !empty($address) && !empty($district) && !empty($gender) && !empty($pass) && !empty($c_pass))
{
$insert="INSERT INTO `Admin_signup`(`Name`, `Admin-email`, `Number`, `Address`, `District`, `Gender`, `Password`) VALUES ('$name','$email','$nmbr','$address','$district','$gender','$pass')";
$insert_result=$conn->query($insert);
if ($insert_result==true) 
{
 if ($conn->affected_rows >0)
  {
   	 $image_location="../prfl_img/$email.jpg";
   	 move_uploaded_file($image, $image_location);

     echo "<script>alert('Successfully data added')</script>";
  }
  else
  {
     echo "<script>alert('unsuccessfully data added')</script>";
  }
}
else
{
  echo "<script>alert('Somrthing went wrong')</script>";
}
}
else
{
  echo "<script>alert('Fillup your all feild')</script>";
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>signup</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<style>
	.header{
		height: 50px;
		width: 100%;
		background-color: #000033;
		margin-top: -20px;
	}

</style>
   <script type="text/javascript">
    
    
    function passwordfn()
    {
        x=document.form.password.value;
          if(x.length>0 && x.length<5)
          {
              document.getElementById('passlen').style.color="RED";
              document.getElementById('passlen').innerHTML="Poor.........Password";
          }
          else if(x.length>=5 && x.length<8)
          {
              document.getElementById('passlen').style.color="ORENGE";
              document.getElementById('passlen').innerHTML="Medium..........Password";
          }
          else if(x.length>=8 && x.length<30)
          {
              document.getElementById('passlen').style.color="GREEN";
              document.getElementById('passlen').innerHTML="Strong..........password";
          }

          else
          {
              document.getElementById('passlen').style.color="";
              document.getElementById('passlen').innerHTML="";
          }
    }


    function confirmpass()
    {
        x=document.form.password.value;
        y=document.form.c_password.value;
          if(x.length>0 && y.length>0)
          {
              if(x!=y)
              {
                  document.getElementById('confirmmessage').style.color="RED";
                  document.getElementById('confirmmessage').innerHTML="Password not match..";
              }
              else
              {
                  document.getElementById('confirmmessage').style.color="GREEN";
                  document.getElementById('confirmmessage').innerHTML="Password match..";
              }
          }
          else
          {
              document.getElementById('confirmmessage').style.color="";
               document.getElementById('confirmmessage').innerHTML="";
          }
    }



     function showPass()
            {
                var pass = document.getElementById('pass');
                if(document.getElementById('check').checked)
                {
                    pass.setAttribute('type','text');
                }else{
                    pass.setAttribute('type','password');
                }
            }
</script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="header">
				<h3 style="text-align: center;padding-top: 12px;font-family: monospace;letter-spacing: 3px; color: white;">CREATE YOUR ACCOUNT</h3>
			</div>
		</div>
	</div>
	<form action="" method="post">
		<div class="container" style="/*border:1px solid black;*/ margin-top: 15px;">
		<div class="row">
			<div class="col-md-6">
				<div class="left-side" style="margin-top: 25px; padding-bottom: 15px;">
					<label>Your Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name"><br>
                        <label>Your Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
                        <label>Your Number:</label>
                        <input type="number" class="form-control" name="number" placeholder="Enter Number"><br>
                        <label>Your Address:</label>
                        <textarea name="address" class="form-control" rows="5" placeholder="Enter address"></textarea><br>
                        <label>Your District:</label>
                        <select name="district" class="form-control">
                            <option hidden="">choice District</option>
                            <option>Dhaka</option>
                            <option>Feni</option>
                            <option>Nowakhali</option>
                             <option>Comilla</option>
                        </select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="right-side" style="margin-top: 25px;">
					<label>Choose Your Gender:</label><br>
                        <input type="radio" name="gender" value="Male">&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female">&nbsp;&nbsp;Female <br><br>
                        <label>Your Password:</label>
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Password" onkeyup="passwordfn()"> 
                        <span id="passlen"></span><br>
                        <input type="checkbox" id="check" onclick="showPass();"/>Show Password<br><br>
                        <label>Your C-Password:</label>
                        <input type="password" name="c_password" class="form-control" placeholder="c-Password"  onkeyup="confirmpass()">
                        <span id="confirmmessage"></span><br>
                        <input type="file" name="image" class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-success form-control">Submit</button><br><br>
                            <a href="sign_in.php" style="text-decoration: none; color: black; font-family: monospace;">Already have an account?</a>
                        
				</div>
			</div>
		</div>
	</div>
	</form>
</body>
</html>