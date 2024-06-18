<?php $conn = new mysqli("localhost","root", "", "project"); ?>

<?php
	

include("cust_profile.php");?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Cancel Booking </span>
			</span>
		</div>
	</div>


<?php require('../config/autoload.php'); 

$dao=new DataAccess();
$info=$dao->getData('*','booking','book_id='.$_GET['id5']);
$file=new FileUpload();
$elements=array(
        "book_id"=>$info[0]['book_id'],"emp_id"=>$info[0]['emp_id'],"prblm_desc"=>$info[0]['prblm_desc'],"from_date"=>$info[0]['from_date'],"to_date"=>$info[0]['to_date'],"cancel_date"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('book_id'=>"Booking Id ","emp_id"=>"Employee Id ","prblm_desc"=>"Problem Description ","from_date"=>"From Date","to_date"=>"To date","cancel_date"=>"Cancel Date");

$rules=array(
    "book_id"=>array("required"=>true),
	
    "emp_id"=>array("required"=>true),
	
    "prblm_desc"=>array("required"=>true),
	
    "from_date"=>array("required"=>true),
	
    "to_date"=>array("required"=>true),
	
    "cancel_date"=>array("required"=>true),


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
$book_id = $_POST["book_id"];
$book_status = 'cancel';

$sql =" UPDATE booking SET book_status='cancel' WHERE book_id='$book_id'";
if ($conn->query($sql) === TRUE) {
    echo "<script> alert('  Cancellation Successfully Done !');</script> ";
	echo"<script> location.replace('bookstatus.php'); </script>";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$book_id = $_POST["book_id"];
//$cancel_date = $_POST["cancel_date"];
$cancel_date=date('Y-m-d',time());
$sql1 = "INSERT INTO cancel(book_id,cancel_date) VALUES ('$book_id','$cancel_date')";

$conn->query($sql1);
    
    
  // echo $sql;
 //header('location:viewcart.php');
echo"<script >location.href = 'bookstatus.php'</script>";


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
<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Cancel Your Booking </h4><br>

	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
<span>Booking Id:</span>

<?= $form->textBox('book_id',array('class'=>'form-control')); ?>
<?= $validator->error('book_id'); ?>

</div>
</div>
<br>
<div class="row">
                    <div class="col-md-6">

<span >Employee Id:</span>
<?= $form->textBox('emp_id',array('class'=>'form-control','disabled'=>'true')); ?>
<?= $validator->error('emp_id'); ?>

</div>
</div>
<br>



<div class="row">
                    <div class="col-md-6">
<span>Problem Desc:</span>

<?= $form->textBox('prblm_desc',array('class'=>'form-control','disabled'=>'true')); ?>
<?= $validator->error('prblm_desc'); ?>

</div>
</div>


<br>
<div class="row">
                    <div class="col-md-6">
<span >From Date:</span>

<?= $form->textBox('from_date',array('class'=>'form-control','disabled'=>'true')); ?>
<?= $validator->error('from_date'); ?>

</div>
</div>


<br>
<div class="row">
                    <div class="col-md-6">
<span>To Date:</span>

<?= $form->textBox('to_date',array('class'=>'form-control','disabled'=>'true')); ?>
<?= $validator->error('to_date'); ?>

</div>
</div>


<br>
<div class="row">
                    <div class="col-md-6">
<span>Cancel Date:</span>

<input type="date" name="cancel_date" value="<?php echo date('Y-m-d'); ?>" disabled class="form-control">

</div>
</div>


<br>
<button type="submit" name="btn_update"  class="btn btn-danger">Cancel Your Bookings </button>
</form></div></div></div></div>

</body>
</html>
<?php
include("footer.php"); 
?>
	