<script>
  function printData()
  {
    var divToPrint=document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();

  }
</script>


<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("Rhead.php");  ?>

<?php
//session_start();

//$a=$_SESSION['emp_email'];
//$e=$_SESSION['emp_id'];

//echo $e;

$sql = "SELECT * FROM booking
ORDER BY from_date DESC";
$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$cust_id = $row['cust_id'];
$prblm_desc = $row['prblm_desc'];
$requester_name = $row['requester_name'];
$emp_id= $row['emp_id'];
$from_date = $row['from_date'];
$to_date = $row['to_date'];
$book_status = $row['book_status'];	
$b_status = $row['b_status'];



}
if(isset($_POST['okay']))
{
	 echo"<script> location.replace('employee_profile.php'); </script>";
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
			<h4 class="main-title" class="text-center p-5"> Received Booking Report </h4><br>
			
			<form action="" method="POST">
			<table border="1" class="table" style="background:white">
		<tr>
			
			<th>Customer id</th>
			<th>Problem_desc</th>
			<th>Requester Name</th>
			<th>Employee id</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Book status</th>
			<th>Current work status </th>
			

			
			
			
		</tr>
<?php 
foreach ($result as $row)
{
 ?>
 	<tr><td><?php echo $row['cust_id']; ?></td>
 		<td><?php echo $row['prblm_desc']; ?></td>
 		<td><?php echo $row['requester_name']; ?></td>
		<td><?php echo $row['emp_id']; ?></td>
         <td><?php echo $row['from_date']; ?></td>
          <td><?php echo $row['to_date']; ?></td>
		<td><?php echo $row['book_status']; ?></td>
          <td><?php echo $row['b_status']; ?></td>
         
 		
 	 </tr>


<?php } ?> 
    </table>
     <div class="row">
           <button class="btn btn-success" type="submit"  name="back" ><a href="Rhead.php">Back</a></button>
           <div class="col-md-3">
                    <input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onclick="printData();" class="btn btn-primary btn-block"></div></div>
               
    <?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'dash.php'</script>";
}     ?>       
        
       </form></body></html>


    <?php include("adfooter.php");  ?>
