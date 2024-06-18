<?php $conn = new mysqli("localhost","root", "", "project"); ?>

<?php include('header.php'); ?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Forgot Password </span>
			</span>
		</div>
	</div>
<?php require('../config/autoload.php'); 


$dao=new DataAccess();


?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body>
	<div class="jumbotron">
		<div class="container">
		
			
			<h2 class="text-center p-5">Reset Your Password</h2><br>
			<form action="" method="POST">

 

 
 <br>
 
			<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Email:</label>
		<input type="text" name="emp_email" id="cust_firstname" class="form-control" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must be a valid email" placeholder="xxx@xx.com"></div></div></div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Enter New Password:</label>
		<input type="password" name="emp_password" id="cust_firstname" class="form-control" required pattern="[a-zA-Z\s]{10}" title="Must be 10 characters"></div></div></div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Re-Enter new Password:</label>
		<input type="password" name="new" id="cust_frstname" class="form-control" required pattern="[a-zA-Z\s]{10}" title="Must be 10 characters"></div></div></div>
		
			
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					
					<input type="submit" name="okay" value="Continue" class="btn btn-success btn-block" class="text-center p-5">
				</div>
			</div></div><br>
		
		
		</form></div></div>
<?php

if(isset($_POST["okay"]))
{
	$emp_password = $_POST['emp_password'];
$new = $_POST['new'];
if($emp_password==$new)
{

$emp_email = $_POST["emp_email"];

$emp_password = $_POST['emp_password'];

$sql =" UPDATE employee SET emp_password='$emp_password' WHERE emp_email='$emp_email'";
if ($conn->query($sql) === TRUE) {
    echo "<script> alert('  Updated Successfully');</script> ";
	echo"<script> location.replace('employee_login.php'); </script>";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else
{
	echo "Passwords doesn't match";
}
}
?>
</body></html>


	<?php include('footer.php'); ?>
