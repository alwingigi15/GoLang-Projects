<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>My Reviews  </span>
			</span>
		</div>
	</div>
<?php
session_start();

$a=$_SESSION['cust_email'];
//$e=$_SESSION['emp_id'];
//echo $e;
$b=$_SESSION['cust_id'];
$sql = "SELECT * FROM review inner join employee using(emp_id)WHERE cust_id = ".$b." 
ORDER BY re_date DESC";
$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$emp_id= $row['emp_id'];
$rating1 = $row['rate_1'];
$rating2= $row['rate_2'];
$comment = $row['comment'];
$re_date = $row['re_date'];




}
if(isset($_POST['okay']))
{
	 echo"<script> location.replace('mycom.php'); </script>";
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
			<h4 class="main-title" class="text-center p-5"> My Reviews  </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			
			<th>Handyman </th>
			
			<th>OverAll performance</th>
			<th>Handyman Performance</th>
			
			<th>FeedBack</th>
			<th>Date</th>
			
			
			<th></th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row) {
 ?>
 	<tr>
 		<td><?php echo $row['emp_firstname']; ?></td>
 			<td><?php echo $row['rate_1']; ?></td>
       <td><?php echo $row['rate_2']; ?></td>
         <td><?php echo $row['comment']; ?></td>
          <td><?php echo $row['re_date']; ?></td>
        <td><a onclick="return confirm('Are You Sure?');" href="delete.php?id=<?php echo $row['review_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5">Delete Your Review </a></h7>
          
 		
 		
 	 </tr>
<?php } ?> 
	</table>
	<?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'profile.php'</script>";
}     ?>   
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					
					<input type="submit" name="okay" value="You Can Check Your Complaints " class="btn btn-success btn-block" class="text-center p-5">
				</div>
			</div></div></form></div></div></div></div></body></html>

<?php
include("footer.php"); 
?>
	
