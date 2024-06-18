<?php 
require('../config/autoload.php');
 $conn = new mysqli("localhost","root", "", "project"); ?>

<?php include("employee_pro.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Booking requests!</span>
			</span>
		</div>
	</div>
<?php
//session_start();

//$a=$_SESSION['emp_email'];
$e=$_SESSION['emp_id'];


//echo $e;

$sql = "SELECT * FROM leaves WHERE emp_id = ".$e." and leave_status!='cancel' 
ORDER BY leave_from DESC";

$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$leave_from = $row['leave_from'];
	
$leave_to = $row['leave_to'];
	
$reason = $row['reason'];

$leave_status = $row['leave_status'];


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
			<h4 class="main-title" class="text-center p-5"> My Leaves </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>From Date</th>
			
			<th>To Date</th>
			
			<th>Reason </th>
			
			<th>Status</th>
			
			<th></th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr>
 		<td><?php echo $row['leave_from']; ?></td>
		
 		<td><?php echo $row['leave_to']; ?></td>
		
        <td><?php echo $row['reason']; ?></td>
		
          <td><?php echo $row['leave_status']; ?></td>
       
          <td><a onclick="return confirm('Are You Sure?');" href="lcancel.php?id1=<?php echo $row['leave_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5"> Cancel Leave </a></h7>
 		
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile1.php'</script>";
}     ?>   
		<div class="col-md-4">
				<div class="form-group">
					<label for="">Your ID:</label>
		<input type="text" name="email" id="email" class="form-control" readonly value="<?php echo $e ?>"></div></div>
		
		
			</form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
