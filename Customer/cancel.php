<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span> your Status  </span>
			</span>
		</div>
	</div>
<?php
session_start();

$a=$_SESSION['cust_email'];
//$e=$_SESSION['emp_id'];
//echo $e;
$c=$_SESSION['cust_id']; 
$sql = "SELECT * FROM booking b,employee  e where b.emp_id=e.emp_id and book_status='booked' and b.b_status='pending' and cust_id = ".$c." ORDER BY from_date DESC";

//$sql = "SELECT * FROM booking inner join employee using(emp_id)WHERE cust_id =".$b." and book_status='booked' and status='pending'
//ORDER BY from_date DESC";
//$sql = "SELECT * FROM booking b,employee  e, customer c where b.emp_id=e.emp_id and b.cust_id=".$name." and book_status='booked' and b.status='pending'";
$result = $conn->query($sql);

if($result->num_rows==1)
{
$row = $result->fetch_assoc();
	
$prblm_desc = $row['prblm_desc'];
	
$requester_name = $row['requester_name'];
	
//$emp_id=$row['emp_id'];
	
$from_date = $row['from_date'];
	
$to_date = $row['to_date'];
	
$b_status = $row['b_status'];



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
			<h4 class="main-title" class="text-center p-5"> Your Bookings  </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>Problem_desc</th>
			
			<th>Requester</th>
			<th>Employee id</th>
			
			<th>From Date</th>
			<th>To Date</th>
			
			
			<th>Status </th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) 
{
 ?>
 	<tr>
		    
		
 		    <td><?php echo $row['prblm_desc']; ?></td>
		
 			<td><?php echo $row['requester_name']; ?></td>
		
		    <td><?php echo $row['emp_firstname']; ?></td>
		
            <td><?php echo $row['from_date']; ?></td>
		
            <td><?php echo $row['to_date']; ?></td>
		
            <td><?php echo $row['b_status']; ?></td>
		
            <td><a onclick="return confirm('Are You Sure You Want to Cancel?');" href="cancelbook.php?id5=<?php echo $row['book_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5"> Cancel Booking</a></h7>
         
 		
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile.php'</script>";
}     ?>   
	</body></html>

<?php
include("footer.php"); 
?>
	
