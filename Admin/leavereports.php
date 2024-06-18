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


$sql = "SELECT * FROM leaves l,employee  e where l.emp_id=e.emp_id";

$result = $conn->query($sql);
if($result->num_rows == 1)
{
$row = $result->fetch_assoc();
	
$leave_id= $row['leave_id'];
	
//$emp_img= $row['emp_img'];
	
$leave_from = $row['leave_from'];
	
$leave_to = $row['leave_to'];

$reason = $row['reason'];
	
$leave_status = $row['leave_status'];
	
//$status = $row['status'];



}
if(isset($_POST['okay']))
{
     echo"<script> location.replace('Rhead.php'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body><br><br><br>
    
    
        <h2 class="text-center p-5"><b>Employee leave Reports</b></h2><br>

            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
                            <th>Sl No</th>
			
                        <th>Employee name</th>
                         
                        <th>From Date</th>
			
                         <th>To Date</th>
			
                         <th>Reason </th>
			
                          <th>Status </th>
                        
            

            
            
            
        </tr>
       
<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['leave_id']; ?></td>
		
       
		
        <td><?php echo $row['emp_firstname']; ?></td>
		
		
        <td><?php echo $row['leave_from']; ?></td>
		
        <td><?php echo $row['leave_to']; ?></td>
		
		 <td><?php echo $row['reason']; ?></td>
		
         <td><?php echo $row['leave_status']; ?></td>
           
        
        
     </tr>
<?php } ?> 
    </table>
    <?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'Rhead.php'</script>";
}     ?>    
<button class="btn btn-success" type="submit"  name="okay" >Back</button>
        <input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onclick="printdata();" class="btn btn-primary">
       </form></body></html>


    
