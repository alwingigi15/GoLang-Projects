<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Make Review And Rating </span>
			</span>
		</div>
	</div>
<?php
session_start();

$a=$_SESSION['cust_email'];
//$e=$_SESSION['emp_id'];
//echo $a;
$b=$_SESSION['cust_id'];
//echo $b;

$sql = "SELECT * FROM booking b,employee  e, customer c where b.emp_id=e.emp_id and b.cust_id=c.cust_id and b.book_status='booked' and b.b_status='complete' and b.cust_id=".$b."";
$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$prblm_desc = $row['prblm_desc'];
//$emp_id = $row['emp_id'];

$from_date = $row['from_date'];
$to_date = $row['to_date'];




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
			<h4 class="main-title" class="text-center p-5"> Register Your FeedBacks </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>Problem_desc</th>
			
			<th>Employee name</th>
			
			
			<th>From Date</th>
			
			<th>To Date</th>
			
			<th>Review </th>
			
			
			<th></th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr>
 		<td><?php echo $row['prblm_desc']; ?></td>
		
 			<td><?php echo $row['emp_firstname']; ?></td>
       
         <td><?php echo $row['from_date']; ?></td>
		
          <td><?php echo $row['to_date']; ?></td>
         
         
           <td><a href="index1.php?id=<?php echo $row['book_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5"> Make Your Review </a></h7>
          
 		
 	 </tr>
<?php } ?> 
	</table>
		<?php 
    if ($result->num_rows <= 0) {
   
 echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile.php'</script>";
}     ?>   
		<form class="d-print-none d-inline mr-3"><button class="btn btn-success" type="submit"  name="back" ><a href="rating.php">Back</a>
		</form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
