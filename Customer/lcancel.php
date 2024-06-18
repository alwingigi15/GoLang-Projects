<?php $conn = new mysqli("localhost","root", "", "project");
require('../config/autoload.php'); ?>

<?php
	

include("employee_pro.php");?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Cancel Leave</span>
			</span>
		</div>
	</div>


<?php 

$dao=new DataAccess();

$e=$_SESSION['emp_id'];
//echo $e;
$info=$dao->getData('*','leaves','leave_id='.$_GET['id1']);
$file=new FileUpload();
$elements=array(
        "leave_id"=>$info[0]['leave_id'],"emp_id"=>$info[0]['emp_id'],"leave_from"=>$info[0]['leave_from'],"leave_to"=>$info[0]['leave_to'],"reason"=>$info[0]['reason']);

	$form = new FormAssist($elements,$_POST);

$labels=array('leave_id'=>"Id ","emp_id"=>"Employee Id ","leave_from"=>"From Date ","leave_to"=>"To Date","reason"=>"Reason");

$rules=array(
    "leave_id"=>array("required"=>true),
    "emp_id"=>array("required"=>true),
"leave_from"=>array("required"=>true),
"leave_to"=>array("required"=>true),
"reason"=>array("required"=>true),



     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if(!isset($_SESSION['emp_email']))
   {
  //   header('location:login1.php');
  echo"<script >location.href = 'customer_login.php'</script>";

  }
  else
  {
   
    $e=$_SESSION['emp_id'];
$avail_status = 'available';


$sql =" UPDATE employee SET emp_avail='available' WHERE emp_id=".$e;
if ($conn->query($sql) === TRUE) {
    echo "<script> alert(' Cancel Your leave ');</script> ";
  echo"<script> location.replace('leavestatus.php'); </script>";
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$name=$_SESSION['emp_email'];
$e=$_SESSION['emp_id'];
      $leave_id=$_GET['id1'];   
          //$fromdate = $_POST["fromdate"];
//$todate = $_POST["todate"];
//$itemname = $iname;
//$fees = $info1[0]["fees"];;
//$advance = $_POST["advance"];
//$_SESSION['advance']=$advance;   

$leave_status='cancel'; 


//$date1=date('Y-m-d',time());

//$balance=$_POST["balance"]; 
//$diffDays= $_SESSION['date2'];    
//$_SESSION['days']=$diffDays;
 
//$total=$_POST["total"]    ;

$sql1 =" UPDATE leaves SET leave_status='cancel' WHERE leave_id=".$leave_id." and emp_id=".$e;
if ($conn->query($sql1) === TRUE) {
    echo "<script> alert(' Cancel Your leave ');</script> ";
  echo"<script> location.replace('leavestatus.php'); </script>";
  
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
}}

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
<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Cancel Your Booking </h4><br>

	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
<span>Leave Id:</span>

<?= $form->textBox('leave_id',array('class'=>'form-control')); ?>
<?= $validator->error('leave_id'); ?>

</div>
</div>
<br>
<div class="row">
                    <div class="col-md-6">

<span >Employee Id:</span>
<?= $form->textBox('emp_id',array('class'=>'form-control')); ?>
<?= $validator->error('emp_id'); ?>

</div>
</div>
<br>




<div class="row">
                    <div class="col-md-6">
<span >From Date:</span>

<?= $form->textBox('leave_from',array('class'=>'form-control')); ?>
<?= $validator->error('leave_from'); ?>

</div>
</div>


<br>
<div class="row">
                    <div class="col-md-6">
<span>To Date:</span>

<?= $form->textBox('leave_to',array('class'=>'form-control')); ?>
<?= $validator->error('leave_to'); ?>

</div>
</div>


<br>



<br>
<button type="submit" name="btn_insert"  class="btn btn-danger">Cancel Your Leave</button>
</form></div></div></div></div>

</body>
</html>
<?php
include("footer.php"); 
?>
	