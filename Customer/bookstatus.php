<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span> Your Booking Status  </span>
			</span>
		</div>
	</div>
<?php
session_start();

$a=$_SESSION['cust_email'];

$c=$_SESSION['cust_id'];

$sql = "SELECT * FROM booking b,employee  e where b.emp_id=e.emp_id and book_status='booked' and b.b_status!='complete' and cust_id = ".$c." ORDER BY from_date DESC";
//$sql = "SELECT * FROM booking b,employee  e, customer c where b.emp_id=e.emp_id and b.cust_id=$name and book_status='booked' and b.status!='complete'";


//$sql = "SELECT * FROM booking inner join employee using(emp_id)
//inner join customer using(cust_id) 
//WHERE book_status='booked' and status!='complete' and cust_id = ".$b."  
//ORDER BY from_date DESC";

$result = $conn->query($sql);

if($result->num_rows==1)
{
$row = $result->fetch_assoc();
	
$cust_id= $row['cust_id'];

$prblm_desc = $row['prblm_desc'];
	
$requester_name = $row['requester_name'];
	
$emp_id= $row['emp_id'];
	
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
			<h4 class="main-title" class="text-center p-5"> Your Bookings </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			<th>Customer Id</th>
			
			<th>Problem_desc</th>
			
			<th>Requester</th>
			
			<th>employee Name</th>
			
			<th>From Date</th>
			
			<th>To Date</th>
			
			
			<th>Status </th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr><td><?php echo $row['cust_id']; ?></td>
		
 	<td><?php echo $row['prblm_desc']; ?></td>
		
 	<td><?php echo $row['requester_name']; ?></td>
		
    <td><?php echo $row['emp_firstname']; ?></td>
		
    <td><?php echo $row['from_date']; ?></td>
		
    <td><?php echo $row['to_date']; ?></td>
		
    <td><?php echo $row['b_status']; ?></td>
		
           <td><a href="bookreport.php?id1=<?php echo $row['book_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5"> Booking Report </a></h7>
 		
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile.php'</script>";
}     ?>   
		<!--<div class="col-md-4">
				<div class="form-group">
					<label for="">Email:</label>
		<input type="text" name="cust_email" id="cust_email" class="form-control" readonly value="<?php echo $a ?>"></div></div>
		
		</form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
