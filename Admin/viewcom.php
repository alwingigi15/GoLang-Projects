

<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("adhead.php");  ?>





<?php

//$e=$_SESSION['emp_id'];
//echo $e;


$sql = "SELECT * FROM complaint as l inner join employee as a on l.emp_id=a.emp_id inner join customer as c on l.cust_id=c.cust_id  
WHERE complaint_status='apply'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{

$row = $result->fetch_assoc();
$emp_id= $row['emp_id'];
$cust_id = $row['cust_id'];
$complaint_desc = $row['complaint_desc'];

$complaint_date = $row['complaint_date'];




}

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body><br><br><br>
    
    
        <h2 class="text-center p-5"><b>Complaints </b></h2><br>
           
            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
             <th > Employee Name</th>
			
            <th > Customer Name</th>
            
            <th >Complaint Description</th>
			
           <th>Complaint Date</th>
			
           
            

            
            
            
        </tr>
<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['emp_firstname']; ?></td>
        <td><?php echo $row['cust_firstname']; ?></td>
            <td><?php echo $row['complaint_desc']; ?></td>
            <td><?php echo $row['complaint_date']; ?></td>
       
           
        <td><a href="reply.php?id=<?php echo $row['complaint_id']; ?>"><h7 class="btn btn-success btn-block" class="text-center p-5">Reply</a></h7>
        
       
        
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
    
