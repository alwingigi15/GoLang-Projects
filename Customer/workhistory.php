<?php 
require('../config/autoload.php');
$conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("employee_pro.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Your Work History !</span>
			</span>
		</div>
	</div>
<?php
//session_start();

$a=$_SESSION['emp_email'];
$e=$_SESSION['emp_id'];
//echo $e;
$sql = "SELECT * FROM booking as b inner join customer as c on b.cust_id=c.cust_id WHERE b_status='complete' and emp_id = ".$e;
$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$cust_id = $row['cust_id'];
$prblm_desc = $row['prblm_desc'];
$requester_name = $row['requester_name'];
$address = $row['address'];
$city = $row['city'];
$contact_no = $row['contact_no'];
$from_date = $row['from_date'];
$to_date = $row['to_date'];




}
if(isset($_POST['okay']))
{
	 echo"<script> location.replace('profile1.php'); </script>";
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
			<h4 class="main-title" class="text-center p-5"> Your Booking History  </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>Customer id</th>
			
			<th>Problem_desc</th>
			
			<th>Requester</th>
			
			<th>House Name</th>
			
			<th>City</th>
			
			<th>Contact No</th>
			
			<th>From Date</th>
			
			<th>To Date</th>
			
			
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr><td><?php echo $row['cust_id']; ?></td>
 		<td><?php echo $row['prblm_desc']; ?></td>
 		<td><?php echo $row['requester_name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['contact_no']; ?></td>
         <td><?php echo $row['from_date']; ?></td>
          <td><?php echo $row['to_date']; ?></td>
        
 		
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href ='profile1.php'</script>";
		
}     ?>   
		
		
		</form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
