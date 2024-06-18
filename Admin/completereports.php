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

//$e=$_SESSION['emp_id'];
//echo $e;


$sql = "SELECT * FROM booking as b inner join employee as e on b.emp_id=e.emp_id inner join customer as c on b.cust_id=c.cust_id

WHERE book_status='booked' and b.b_status='complete'
ORDER BY from_date DESC";
$result = $conn->query($sql);
if($result->num_rows == 1)
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

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>

</head>

<body><br><br><br>
    
    
        <h2 class="text-center p-5"><b>Completed Booking Reports</b></h2><br>

            <form action="" method="POST">
            <table border="1" class="table" >
        <tr>
            
             <th > Customer Name</th>
			
            <th >Problem description</th>
            
            <th >Requester</th>
			
            <th >Employee Name</th>
            
            <th >From Date</th>
			
            <th >To Date</th>
            
            
            <th >Status </th>
            

            
            
            
        </tr>

<?php 
foreach ($result as $row) {
 ?>
    <tr> <td><?php echo $row['cust_firstname']; ?></td>
        <td><?php echo $row['prblm_desc']; ?></td>
            <td><?php echo $row['requester_name']; ?></td>
       <td><?php echo $row['emp_firstname']; ?></td>
         <td><?php echo $row['from_date']; ?></td>
          <td><?php echo $row['to_date']; ?></td>
           <td><?php echo $row['b_status']; ?></td>
           
        
        
     </tr>
<?php } ?> 

    </table>
     <?php 
    if ($result->num_rows <= 0) {
   
  echo "<script> alert('Sorry No Records Found');</script> ";
   
echo"<script >location.href = 'bookingreports.php'</script>";
}     ?>     
      


                    <div class="row">
           <button class="btn btn-success" type="submit"  name="back" ><a href="Rhead.php">Back</a></button>
           <div class="col-md-3">
                    <input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onclick="printData();" class="btn btn-primary btn-block"></div></div>
           
       </form></body></html>


    
