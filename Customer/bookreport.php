

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
<?php require('../config/autoload.php'); 

$dao=new DataAccess();
$info=$dao->getData('*','booking','book_id='.$_GET['id1']);
?>
<?php 

//session_start();

$a=$_SESSION['cust_email'];
//$e=$_SESSION['emp_id'];
//echo $e;
$b=$_SESSION['cust_id'];
$sql = "SELECT * FROM booking inner join employee using(emp_id) 
WHERE cust_id = ".$b."
ORDER BY from_date DESC";
$result = $conn->query($sql);
if($result->num_rows==1)
{
$row = $result->fetch_assoc();
$prblm_desc = $row['prblm_desc'];
$requester_name = $row['requester_name'];
$emp_id= $row['emp_id'];
$from_date = $row['from_date'];
$to_date = $row['to_date'];
$status = $row['status'];



}
if (isset($_POST['back'])) 
{
	# code...
	echo"<script> location.replace('bookstatus.php'); </script>";
}
?>
<center>
  <div class="jumbotron">
        <div class="container">
         <h1 class="text-center p-5"> HOME SERVE HANDYMAN SERVICES</h1><br>
        <h2 class="text-center p-5">Booking Request </h2><br>
<form action="" method="POST">



<div class="feedback">
<br>
<p><h4>Dear Customer,<br>
Thank you for getting your booking at our website. We would like to know how we performed.</h4></p><br>

<div class="row">
<div class="col-md-6">
<h4>Customer Name         : <?php echo $info[0]["requester_name"] ?></h4></div>
<div class="col-md-6">
<h4>Problem Description   : <?php echo $info[0]["prblm_desc"] ?></h4></div>
<div class="col-md-6">
<h4>Housename             : <?php echo $info[0]["address"] ?></h4></div>
<div class="col-md-6">
<h4>City                  : <?php echo $info[0]["city"] ?></h4></div>

<div class="col-md-6">
<h4>Contact Number        : <?php echo $info[0]["contact_no"] ?></h4></div>
<div class="col-md-6">
<h4>From Date             : <?php echo $info[0]["from_date"] ?></h4></div>

<div class="col-md-6">
<h4>To Date               : <?php echo $info[0]["to_date"] ?></h4></div>
<div class="col-md-6">
<h4>No of Days of Work    : <?php echo $info[0]["days"] ?></h4></div>

         
 		
 		
 	 
</div>

</div><br>

<div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    
                    <input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onclick="printData();" class="btn btn-success btn-block" class="text-center p-5">
                </div>
            </div></div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    
                    <input type="submit" name="back" value="Back"  class="btn btn-success btn-block" class="text-center p-5">
                </div>
            </div></div>
</div></form></div></div></center>


