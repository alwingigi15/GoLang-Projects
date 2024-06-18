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


$sql = "SELECT * FROM complaint b,employee  e, customer c where b.emp_id=e.emp_id and b.cust_id=c.cust_id";

$result = $conn->query($sql);
if($result->num_rows == 1)
{
$row = $result->fetch_assoc();
	
$complaint_id= $row['complaint_id'];
	
//$emp_img= $row['emp_img'];
	
$complaint_desc  = $row['complaint_desc'];
	
$complaint_date  = $row['complaint_date'];

$replay   = $row['replay'];
	

	
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
    
    
        <h2 class="text-center p-5"><b>Customer Complaint Reports</b></h2><br>

            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
                          <th>Sno</th>
			
                        <th>Customer name</th>
			
                       <th>Employee name</th>
			
                       <th>Complaint Description </th>
			
                       <th>Date </th>
			
                       <th> Reply </th>

            
            
            
        </tr>
       
<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['complaint_id']; ?></td>
		
        <td><?php echo $row['cust_firstname']; ?></td>
		
        <td><?php echo $row['emp_firstname']; ?></td>
		
        <td><?php echo $row['complaint_desc']; ?></td>
		
        <td><?php echo $row['complaint_date']; ?></td>
		
		 <td><?php echo $row['replay']; ?></td>
		
         
           
        
        
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


    
