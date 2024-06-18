<?php include("header.php"); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
	<title>login-Employee work Management</title>
	
</head>
<body>
<div class="loginbox">
    
<form class="box" action="" method="post">
	
	<br>
	<div class=container>
	<div class=row>
	<div class="form-group">
	<div class="col-md-4">
		 <i class="fa fa-user icon"></i>
		<label for="" class="contact-form-text" style="color:black">Username</label>
	<input type="text" name="uname" id="uname"  class="form-control" required=""></div></div></div><br>
	<div class=row>
	<div class="form-group">
	<div class="col-md-4">
		 <i class="fa fa-key icon"></i>
		<label for="" class="contact-form-text" style="color:black">Password</label>
	<input type="password" name="pass" id="pass"  class="form-control" required=""></div></div></div>
	<div class=row>
	<div class="form-group">
	<div class="col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-success"></div></div></div>
	</div></center>
</form>
</div>
<?php
if (isset($_POST["submit"])) {
	$uname= $_POST["uname"];
	$pass= $_POST["pass"];
	if ($uname=="admin" && $pass=="admin")
	 {
	//header('location:dash.php');
	echo "<script>alert('login success'); </script>";
	echo "<script>location.replace('dash.php');</script>";	
	}
	else 
	{
		//echo " Invalid";

	echo "<script>alert('login failed'); </script>";
	}
}
?>
</body>
</html>