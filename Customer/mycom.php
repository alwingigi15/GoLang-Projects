<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>My Complaints   </span>
			</span>
		</div>
	</div>
<?php
session_start();

$a=$_SESSION['cust_email'];
//$e=$_SESSION['emp_id'];
//echo $e;
$b=$_SESSION['cust_id'];
$sql = "SELECT * FROM complaint inner join employee using(emp_id)WHERE cust_id = ".$b." 
ORDER BY complaint_date DESC";

$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$emp_id= $row['emp_id'];
$complaint_desc = $row['complaint_desc'];
$complaint_date= $row['complaint_date'];
$replay = $row['replay'];
//$re_date = $row['re_date'];




}
if(isset($_POST['okay']))
{
	 echo"<script> location.replace('profile.php'); </script>";
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
			<h4 class="main-title" class="text-center p-5"> My Complaints  </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>Employee Name</th>
			
			<th>Complaint</th>
			
			<th>Date</th>
			
			<th>Reply</th>
			
			
			
		

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr>
 		<td><?php echo $row['emp_firstname']; ?></td>
 			<td><?php echo $row['complaint_desc']; ?></td>
       <td><?php echo $row['complaint_date']; ?></td>
         <td><?php echo $row['replay']; ?></td>
         
          
 		
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile.php'</script>";
}     ?>   
		<form class="d-print-none d-inline mr-3"><button class="btn btn-success" type="submit"  name="back" ><a href="feedback.php">Back</a>
		</form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
