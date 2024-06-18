<?php require('../config/autoload.php'); ?>
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("employee_pro.php");	?>
<div class="breadcrumbs-w3l">
    <div class="container">
      <span class="breadcrumbs">
        <a href="index.php">Home</a> 
        <span>Apply For Leave</span>
      </span>
    </div>
  </div>
<?php



$dao=new DataAccess();
//session_start();
$e = isset($_SESSION['emp_id']) ? $_SESSION['emp_id'] : 0;

//$info=$dao->getData('*','employee','emp_id='.$_GET['id4']);
$file=new FileUpload();
$elements=array(
       "emp_id"=>"","leave_from"=>"","leave_to"=>"","reason"=>"");
//$d=$_SESSION['client_frstname'];
	$form = new FormAssist($elements,$_POST);

$labels=array("emp_id"=>"empl","leave_from"=>"From Date","leave_to"=>"To Date","reason"=>"Reason For Leave");

$rules=array(
  
	 "emp_id"=>array("required"=>true),
    "leave_from"=>array("required"=>true,'date'=>array('from'=>'today','to'=>'3 days 12 am')),
    "leave_to"=>array("required"=>true,'datecompare'=>array('comparewith'=>'leave_from','operator'=>'>=')),
    "reason"=>array("required"=>true,),
   
   
	);
    
    
$validator = new FormValidator($rules,$labels);


if (isset($_POST["btn_insert"])) {
  if (!isset($_SESSION['emp_email'])) {
      // handle the case where the session is not set
  } else {
      $e = $_SESSION['emp_id'];

      // Insert leave request
      $leave_from = $_POST['leave_from'];
      $leave_to = $_POST['leave_to'];
      $reason = $_POST['reason'];
      $leave_status = 'pending';

      $sqlInsertLeave = "INSERT INTO leaves(emp_id,leave_from,leave_to,reason,leave_status) VALUES ('$e','$leave_from','$leave_to','$reason','$leave_status')";
      if ($conn->query($sqlInsertLeave) === TRUE) {
          // Leave request inserted successfully

          // Check if leave starts today, then update availability to 'Unavail'
          $today = date('Y-m-d');
          if ($leave_from == $today) {
              $sqlUpdateAvailability = "UPDATE employee SET emp_avail='Unavail' WHERE emp_id=" . $e;
              if ($conn->query($sqlUpdateAvailability) === TRUE) {
                  echo "<script> alert('Leave request generated ');</script> ";
                  echo "<script> location.replace('leavestatus.php'); </script>";
              } else {
                  echo "Error updating availability: " . $conn->error;
              }
          }

          // Redirect to leavestatus.php after submitting the form
          echo "<script>location.href = 'leavestatus.php'</script>";
      } else {
          echo "Error inserting leave request: " . $conn->error;
      }
  }
}

// Check if leave is finished.

$sqlCheckLeaveFinished = "SELECT emp_id FROM leaves WHERE emp_id = $e AND leave_to < CURRENT_DATE AND leave_status = 'approved'";
$resultCheckLeaveFinished = $conn->query($sqlCheckLeaveFinished);

if ($resultCheckLeaveFinished->num_rows > 0) {
  // Leave is finished, update availability to 'Available'
  $sqlUpdateAvailability = "UPDATE employee SET emp_avail='available' WHERE emp_id=" . $e;
  if ($conn->query($sqlUpdateAvailability) === TRUE) {
      // Employee availability updated successfully
  } else {
      echo "Error updating availability: " . $conn->error;
  }
}


?>
<html>
<head>
    <style>
        .form{
        border:3px solid blue;
        }
    </style>
</head>
<body>


    <div class="container">
    <div class="boxed">
    <div id="news" class="w3ls-section">
    <div class="container">
      <h4 class="main-title" class="text-center p-5">Leave Request</h4><br>
      <form action="" method="POST">
    <?php 
if(isset($_SESSION['emp_email']))
{ 
  

   $name=$_SESSION['emp_email'];
?>

 
<?php } ?>
 


<table>
<tr>
 

<div class="col-md-4">
                <div class="form-group">
                 
        <input type="hidden" name="emp_id" id="email" class="form-control" value="<?php echo $e; ?>" disabled></div></div>

<br>

                    <div class="col-md-4">
						<div class="form-group">
                    <label for="">From Date :</label>
        <input type="date" name="leave_from" id="email" class="form-control" required min="<?php echo date('Y-m-d'); ?>"></div></div>


<div class="col-md-4">
                <div class="form-group">
                    <label for="">To Date :</label>
        <input type="date" name="leave_to" id="email" class="form-control"  required min="<?php echo date('Y-m-d'); ?>"></div></div>


<div class="col-md-12">
                <div class="form-group">
                    <label for="">Reason:</label>
        <input type="text" name="reason" id="email" class="form-control"  required pattern="[a-zA-Z\s]{0,50}" title="Within 50 characters"></div></div></div>

<br>

<div class="row">
      <div class="col-md-12">
        <div class="form-group">
          
          <input type="submit" name="btn_insert" value="Apply" class="btn btn-success btn-block" class="text-center p-5">
        </div>
      </div></div>

</tr></table>

</form>
</div></div></div></div></div>
</body>
</html>
<?php include("footer.php"); ?>
