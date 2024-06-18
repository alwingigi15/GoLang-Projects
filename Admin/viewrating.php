

<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("adhead.php");  ?>





<?php




$sql = "SELECT * FROM review as l inner join employee as a on l.emp_id=a.emp_id inner join customer as c on l.cust_id=c.cust_id";
$result = $conn->query($sql);
if($result->num_rows == 1)
{

$row = $result->fetch_assoc();
$emp_id= $row['emp_id'];
$cust_id = $row['cust_id'];
$rate_1 = $row['rate_1'];
$rate_2 = $row['rate_2'];
$comment = $row['comment'];
$re_date = $row['re_date'];




}

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body><br><br><br>
    
    
        <h2 class="text-center p-5"><b>Reviews </b></h2><br>
           
            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
             <th > Employee Name</th>
			
            <th > Customer Name</th>
            
            <th >Overall Performance</th>
			
           <th>Employee Performance</th>
			
           <th>Comment</th>
			
           <th>Date</th>
			
          
            

            
            
            
        </tr>
<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['emp_firstname']; ?></td>
        <td><?php echo $row['cust_firstname']; ?></td>
            <td><?php echo $row['rate_1']; ?></td>
            <td><?php echo $row['rate_2']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td><?php echo $row['re_date']; ?></td>
       
       
        
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
    
