<?php $conn = new mysqli("localhost","root", "", "project"); ?>

<?php
	

include("cust_profile.php");?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Make complaint </span>
			</span>
		</div>
	</div>


<?php require('../config/autoload.php'); 

$dao=new DataAccess();
$info=$dao->getData('*','booking','book_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cust_id"=>$info[0]['cust_id'],"emp_id"=>$info[0]['emp_id'],"complaint"=>"","com_date"=>"","book_id"=>$info[0]['book_id']);

	$form = new FormAssist($elements,$_POST);

$labels=array('cust_id'=>"Cust Id ","emp_id"=>"Employee Id ","complaint"=>"Make Your compalint","com_date"=>"Date","book_id"=>"book Id ");

$rules=array(
    "cust_id"=>array("required"=>true),
	
    "emp_id"=>array("required"=>true),
	
"complaint"=>array("required"=>true),

"com_date"=>array("required"=>true),

"book_id"=>array("required"=>true),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

//echo $POST["ename"];


$cust_id = $_POST["cust_id"];
	
$emp_id = $_POST["emp_id"];
	
$complaint = $_POST["complaint"];

//$cancel_date = $_POST["cancel_date"];
$com_date=date('Y-m-d',time());
	
$reply=null;
	
$com_status='apply';
	
$book_id = $_POST["book_id"];
	
$sql1 = "INSERT INTO complaint(cust_id,emp_id,complaint_desc,complaint_date,replay,complaint_status,book_id) VALUES ('$cust_id','$emp_id','$complaint','$com_date','$reply','$com_status','$book_id')";

$conn->query($sql1);
    
    
  // echo $sql;
 //header('location:viewcart.php');
echo "<script>alert('complaint generted'); </script>";
echo"<script >location.href = 'feedback.php'</script>";



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
			<h4 class="main-title" class="text-center p-5"> Register Complaint </h4><br>

	<form action="" method="POST" enctype="multipart/form-data" >
	<input type="text" name="cust_id" value="<?php echo $info[0]["cust_id"];  ?>" hidden >
	<input type="text" name="emp_id" value="<?php echo $info[0]["emp_id"];  ?>" hidden >
 
<input type="text" name="book_id" value="<?php echo $info[0]["book_id"];  ?>"  hidden>



<div class="row">
                    <div class="col-md-6">
<span">Complaint:</span>

<input type="text" name="complaint" class="form-control" required pattern="[a-zA-Z\s]{0,50}" title="With in  50 Characters">
<?= $validator->error('complaint'); ?>

</div>
</div>





<br>
<div class="row">
                    <div class="col-md-6">
<span>Date:</span>

<input type="date" name="com_date" value="<?php echo date('Y-m-d',time()); ?>" class="form-control">

</div>
</div>


<br>
<input type="submit" name="insert" value="Register Your Complaint " class="btn btn-success btn-block" class="text-center p-5">
</form>
</div></div></div></div>
</body>
</html>
<?php 
include("footer.php"); ?>
