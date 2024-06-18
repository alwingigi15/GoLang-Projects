

<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("adhead.php");  ?>





<?php

//$e=$_SESSION['emp_id'];
//echo $e;


$sql = "SELECT * FROM leaves as l inner join employee as a on l.emp_id=a.emp_id  
WHERE status='approved' and leave_status='pending'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{

$row = $result->fetch_assoc();
$emp_id= $row['emp_id'];
$leave_from = $row['leave_from'];
$leave_to = $row['leave_to'];

$reason = $row['reason'];




}

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body><br><br><br>
    
    
        <h2 class="text-center p-5"><b>Customer Reports</b></h2><br>
           
            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
             <th > Employee Name</th>
            <th >Leave From Date</th>
            
            <th >Leave To Date</th>
           <th>Reason For Leave</th>
           <th></th>
            

            
            
            
        </tr>
<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['emp_firstname']; ?></td>
        <td><?php echo $row['leave_from']; ?></td>
            <td><?php echo $row['leave_to']; ?></td>
            <td><?php echo $row['reason']; ?></td>
       
           
        <td><a onclick="return confirm('Are You Sure?');" href="lapprove.php?id=<?php echo $row['leave_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5">Approve</a></h7>
        <td><a onclick="return confirm('Are You Sure?');" href="lreject1.php?id=<?php echo $row['leave_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5">Reject</a></h7>
       
       
        
     </tr>
<?php } ?> 
    </table>
    
        <?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'dash.php'</script>";
}     ?>     
       </form></body></html>

<?php include("adfooter.php"); ?>
    
