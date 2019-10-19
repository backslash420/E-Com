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
$image=$_FILES['image']['tmp_name'];
$image = addslashes($image);
$img = file_get_contents($image);
$img = base64_encode($img);
if (!empty($name) && !empty($email) && !empty($nmbr) && !empty($address) && !empty($district) && !empty($gender) && !empty($pass) && !empty($c_pass))
{
$insert="INSERT INTO `Admin_signup`(`Name`, `Admin-email`, `Number`, `Address`, `District`, `Gender`, `Password`, `Image`) VALUES ('$name','$email','$nmbr','$address','$district','$gender','$pass','$img')";
$insert_result=$conn->query($insert);
if ($insert_result==true) 
{
 if ($conn->affected_rows >0)
  {
   
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/fontawesome.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/fontawesome.min.css" type="text/css" media="all">
    

</head>
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
<div class="header" style="height: 50px; width: 100%;background-color: #627271; ">
  <h3 style="padding-left:30%;color:white;font-family: monospace;letter-spacing: 3px; ">ADMIN SIGNUP</h3>
  <br>

  </div>
   <div class="signup" style="height:auto; width: 50%; background-color:bisque; margin-top: 75px;">
               
              <form method="post" enctype="multipart/form-data" name="form">
                        <h1>Sign Up Your Data</h1>
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
                        </select><br>
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
                        <a href="index.php?&&page=sign_in">Already have a account?</a>
                        <BR><BR>
                    </form>
            
        </div>
     </div>
</body>
</html>