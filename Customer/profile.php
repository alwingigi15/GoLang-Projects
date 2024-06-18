<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Profile</span>
			</span>
		</div>
	</div>
<?php
session_start();

if($_SESSION['cust_email']){
	$cust_email = $_SESSION['cust_email'];
}
else
{
echo "<script> location.href='cust_login.php'</script>";
}
$sql = "SELECT cust_firstname,cust_lastname,cust_gender,cust_age,cust_address,cust_email,mobileno,password FROM customer WHERE cust_email = '$cust_email'";

$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$cust_firstname = $row['cust_firstname'];
	
$cust_lastname = $row['cust_lastname'];
	
$cust_gender = $row['cust_gender'];
	
$cust_age = $row['cust_age'];
	
$cust_address = $row['cust_address'];
	
$mobileno = $row['mobileno'];
	
$password = $row['password'];

	

}
if(isset($_POST['delete']))
{
$sql1 ="DELETE FROM customer WHERE cust_email='$cust_email'";
if ($conn->query($sql1) === TRUE) {
    echo "<script> alert(' Deleted Your Account Successfully');</script> ";
	echo"<script> location.replace('cust_login.php'); </script>";
	
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
}	

if(isset($_POST["update"]))
{

$firstname = $_POST["cust_firstname"];
	
$lastname = $_POST["cust_lastname"];

$cust_age = $_POST['cust_age'];

$address = $_POST['cust_address'];
	
$//cust_email= $_POST['cust_email'];
	
$mobileno = $_POST['mobileno'];


$password = $_POST['password'];


$sql2 ="UPDATE customer SET cust_firstname='$firstname',cust_lastname='$lastname',cust_age='$cust_age',cust_address='$address',mobileno='$mobileno',password='$password' WHERE cust_email='$cust_email'";
if ($conn->query($sql2) === TRUE) {
    echo "<script> alert('Updated Successfully');</script> ";
	echo"<script> location.replace('profile.php'); </script>";
	
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body>
	<div class="box">
	
	
		<div class="container">
		<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Your Profile </h4><br>
			<hr><hr>
			<form action="" method="POST">
			<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">First Name:</label>
                        
		<input type="text" name="cust_firstname" id="cust_firstname" class="form-control" value="<?php echo $cust_firstname ?>" pattern="[a-zA-Z\s]{0,20}" title="Within 20 characters"></div></div>
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Last Name:</label>
		<input type="text" name="cust_lastname" id="cust_lastname" class="form-control" value="<?php echo $cust_lastname ?>" pattern="[a-zA-Z\s]{0,20}" title="Within 20 characters"></div></div>
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Age:</label>
		<input type="text" name="cust_age" id="cust_age" class="form-control" value="<?php echo $cust_age ?>" pattern="[0-9\s]{0,2}" title="Within 2 Digits"></div></div></div><br>
		<div class="row">
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Gender:</label>
		<input type="text" name="cust_gender" id="cust_gender" class="form-control" value="<?php echo $cust_gender ?>" disabled></div></div>
		<div class="col-md-6">
				<div class="form-group">
					<label for="">House name:</label>
					
		<input type="textarea" cols="2" rows="4" name="cust_address" id="cust_address" value="<?php echo $cust_address ?>" class="form-control" pattern="[a-zA-Z\s]{0,50}" title="Within 50 characters"></textarea> </div></div></div><br>
		<div class="row">
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Contact No:</label>
		<input type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo $mobileno ?>" pattern="[987][0-9\s]{9}" title="Must be 10 Digits "></div></div>
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Email :</label>
		<input type="text" name="cust_email" id="cust_email" class="form-control" value="<?php echo $cust_email ?>" disabled></div></div>
			
		
			
			
			
			
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Password:</label><br>
		<input type="text" name="password" id="password" class="form-control" value="<?php echo $password ?>"></div></div></div><br>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					
					<input type="submit" name="delete" value="Delete Acoount" class="btn btn-primary btn-block" class="text-center p-5">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					
					<input type="submit" name="update" value="Update Profile" class="btn btn-success btn-block" class="text-center p-5">
				</div>
			</div></div>
		
		</form></div></div></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
