
<?php 
require('../config/autoload.php'); 
$conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("employee_pro.php"); ?>
<div class="breadcrumbs-w3l">
<div class="container">
<span class="breadcrumbs">
 

</span>
</div>
</div>
<?php

	//$a= $_SESSION['c_username'];

$dao=new DataAccess();


if(ISSET($_SESSION['emp_email'])){
$emp_email=$_SESSION['emp_email'];


}
else{
	echo "<script> location.href='employee_login.php'</script>";
}

$sql = "SELECT emp_img,emp_firstname,emp_lastname,dob,age,gender,emp_address,city,phn_no,doj,emp_email,emp_password,catid,emp_desc,emp_exp FROM employee WHERE emp_email='$emp_email'";

$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();

$emp_img = $row['emp_img'];
	
$emp_firstname = $row['emp_firstname'];
	
$emp_lastname = $row['emp_lastname'];
	
$dob = $row['dob'];
	
$age = $row['age'];
	
$gender = $row['gender'];
	
$emp_address = $row['emp_address'];
	
//$area_id = $row['area_id'];
	
$city = $row['city'];

$phn_no = $row['phn_no'];
	
$doj = $row['doj'];
	
$emp_email=$row['emp_email'];
	
$emp_password=$row['emp_password'];
	
	
//$catid = $row['catid'];
	
$emp_desc = $row['emp_desc'];
	
$emp_exp = $row['emp_exp'];

}
if(isset($_POST['delete']))
{
$sql1 ="DELETE FROM employee WHERE emp_email='$emp_email'";
if ($conn->query($sql1) === TRUE) {
    echo "<script> alert(' Deleted Your Nomination Successfully');</script> ";
echo"<script> location.replace('profile1.php'); </script>";

} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
}

if(isset($_POST["update"]))
{




$emp_firstname = $_POST["emp_firstname"];
	
$emp_lastname = $_POST["emp_lastname"];

$age = $_POST['age'];

$emp_address = $_POST['emp_address'];
	
$city = $_POST['city'];
		
$phn_no = $_POST['phn_no'];
	
//$emp_email=$_POST['emp_email'];
	
$emp_password=$_POST['emp_password'];
	
$emp_exp = $_POST['emp_exp'];



$sql =" UPDATE employee SET emp_firstname='$emp_firstname',emp_lastname='$emp_lastname',age='$age',emp_address='$emp_address',city='$city',phn_no='$phn_no',emp_password='$emp_password',emp_exp='$emp_exp' WHERE emp_email='$emp_email'";
if ($conn->query($sql) === TRUE) {
    echo "<script> alert('  Updated Successfully');</script> ";
	
echo"<script> location.replace('profile1.php'); </script>";

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
	
		<div class="container">
		
			<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5">Your Profile</h4><br>
			<form action="" method="POST">

 
 <div class="col-md-8">
 
 <br>





 
			<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					<label for="">First Name:</label>
		<input type="text" name="emp_firstname" id="emp_firstname" value="<?php echo $emp_firstname ?>" class="form-control" pattern="[a-zA-Z\s]{0,20}" title="Within 20 characters">
				
				</div></div>
		
				
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Last Name:</label>
		<input type="text" name="emp_lastname" id="emp_lastname" value="<?php echo $emp_lastname ?>" class="form-control"  pattern="[a-zA-Z\s]{0,20}" title="Within 20 characters">
				
				</div></div>
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Date of Birth:</label>
		<input type="text" name="dob" id="emp_lastname" readonly value="<?php echo $dob ?>" class="form-control" disabled>
				
				</div></div><br>
				
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Age:</label>
		<input type="text" name="age" id="age" value="<?php echo $age ?>" class="form-control" pattern="[0-9\s]{0,2}" title="only 2 digits ">
					
				</div></div>
			
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Gender:</label>
		<input type="text" name="gender" id="gender" readonly value="<?php echo $gender ?>" class="form-control" disabled>
				
				</div></div>
			
		
			
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">House name:</label>
		<input type="text" name="emp_address" id="emp_address" value="<?php echo $emp_address ?>" class="form-control" title="Within 50 characters">
				
				</div></div>
			
			
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">City :</label>
		<input type="text" name="city" id="cust_lastname" value="<?php echo $city ?>" class="form-control" pattern="[a-zA-Z\s]{0,20}" title="Within 20 characters">
					
				</div></div>
		
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Phone :</label>
		<input type="text" name="phn_no" id="mobileno" value="<?php echo $phn_no ?>" class="form-control" title="Must be 10 digits">
				
				</div></div>
			
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Date of joining:</label>
		<input type="text" name="doj" id="doj" readonly value="<?php echo $doj ?>" class="form-control" disabled>
				
				</div></div><br>
			
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Email id :</label>
		<input type="text" name="emp_email" id="emp_email" value="<?php echo $emp_email ?>" class="form-control" disabled>
				</div></div>
			
			
				
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Paasword :</label>
		<input type="text" name="emp_password" id="emp_password" value="<?php echo $emp_password ?>" class="form-control" ></div></div>
			
	
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Description:</label>
		<input type="text" name="emp_desc" id="emp_desc" readonly value="<?php echo $emp_desc ?>" class="form-control" disabled>
				
				</div></div><br>
	
			<div class="col-md-8">
				<div class="form-group">
					<label for="">Experience :</label>
		<input type="text" name="emp_exp" id="emp_exp" value="<?php echo $emp_exp ?>" class="form-control" ></div></div>
			
		
		
			<div class="col-md-8">
				<div class="form-group">
					
					<input type="submit" name="delete" value="Delete Acoount" class="btn btn-primary btn-block" class="text-center p-5">
				</div>
			</div>
			<hr>
			<div class="col-md-8">
				<div class="form-group">
					
					<input type="submit" name="update" value="Update Profile" class="btn btn-success btn-block" class="text-center p-5">
				</div>
			</div></div>
		</div></div>
		</form></div></div></div></div></body></html>


	
