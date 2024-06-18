<?php require('../config/autoload.php'); ?>
<?php $conn = new mysqli("localhost","root", "","project"); ?>
<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
    <div class="container">
      <span class="breadcrumbs">
        <a href="index.php">Home</a> |
        <span>Book Now!</span>
      </span>
    </div>
  </div>
<?php



$dao=new DataAccess();

$b=$_SESSION['cust_id'];
$from_date=$_SESSION['from_date'];
              
 $to_date=$_SESSION['to_date'];
 $days=$_SESSION['days'];
  

$info=$dao->getData('*','employee','emp_id='.$_GET['id4']);

$file=new FileUpload();
$elements=array(
        "emp_id"=>$info[0]['emp_id'],"emp_firstname"=>$info[0]['emp_firstname'],"book_date"=>"","prblm_desc"=>"","requester_name"=>"","address"=>"","city"=>"","area_id"=>"","contact_no"=>"","from_date"=>"","to_date"=>"","cust_email"=>"cust_email","cust_id"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array("emp_id"=>"ID of Employee","emp_firstname"=>"Name of the employee","book_date"=>"Booking Date","prblm_desc"=>"Description about Problem","requester_name"=>"Requster Name","address"=>"Housename","city"=>"City","area_id"=>"Landmark","contact_no"=>"Contact Number","from_date"=>"Booking Date","to_date"=>"To Date","cust_email"=>"email","cust_id"=>"customer Id",);

$rules=array(
  
	"emp_id"=>array("required"=>true),
	
    "emp_firstname"=>array("required"=>true),
	
    "book_date"=>array("required"=>true),
	
    "prblm_desc"=>array("required"=>true,"minlength"=>3,"maxlength"=>50,"alphaspaceonly"=>true),
	
    "requester_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),

    "address"=>array("required"=>true,"minlength"=>3,"maxlength"=>50,"alphaspaceonly"=>true),
	
    "city"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
	
    "area_id"=>array("required"=>true),
	
    "contact_no"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
	
    "from_date"=>array("required"=>true),
	
    "to_date"=>array("required"=>true),
	
    "cust_email"=>array("required"=>true),
	
    "cust_id"=>array("required"=>true),
    
   
	);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if(isset($_SESSION['cust_email']))
   {
 
$emp_id=$_POST['emp_id'];
	
$name=$_SESSION['cust_email'];
	  
$b=$_SESSION['cust_id'];
	  
$from_date=$_SESSION['from_date'];
	  
$to_date=$_SESSION['to_date'];
	  
$days=$_SESSION['days'];

$book_date=date('Y-m-d',time());
	  
$prblm_desc=$_POST['prblm_desc'];
	  
 $requester_name=$_POST['requester_name'];
	  
 $address=$_POST['address'];
	  
 $city=$_POST['city'];
	  
 $area_id=$_POST['area_id'];
	  	  
 $contact_no=$_POST['contact_no'];
	           
//$cust_email=$_POST['cust_email'];
	  
$book_status='booked'; 
	  
$b_status='pending';

  

$sql = "INSERT INTO booking(emp_id,cust_id,book_date,prblm_desc,requester_name,address,city,area_id,contact_no,from_date,to_date,cust_email,days,book_status,b_status) VALUES ('$emp_id','$b','$book_date','$prblm_desc','$requester_name','$address','$city','$area_id','$contact_no','$from_date','$to_date','$name','$days','$book_status','$b_status')";
	

$conn->query($sql);
    
 
echo "<script>alert('Thankyou for booking');</script>";
echo"<script >location.href = 'bookstatus.php'</script>";
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
    <div class="boxed">
    <div id="news" class="w3ls-section">
    <div class="container">
      <h4 class="main-title" class="text-center p-5"> Booking Request </h4><br>
      <form action="" method="POST">
    <?php 
if(isset($_SESSION['cust_email']))
{ 
  

   $name=$_SESSION['cust_email'];
?>

 
<?php } ?>
 


<table>
<tr>
 
<div class="row"><div class="form-group">
                    <div class="col-md-6">
<span>Selected Employee ID</span>

<?= $form->textBox('emp_id',array('class'=>'form-control')); ?>
<?= $validator->error('emp_id'); ?>

</div>
</div>
<div class="col-md-6">
                <div class="form-group">
                <label for="">Selected Employee Name:</label>
        <input type="text" name="emp_firstname" id="cust_email" class="form-control" value="<?php echo $info[0]['emp_firstname']; ?>" disabled></div></div></div>

<br>
<div class="row"><div class="form-group">
                    <div class="col-md-4">
                    <label for="">From Date :</label>
        <input type="date" name="from_date" id="email" class="form-control" value="<?php echo $from_date ?>" disabled></div></div>


<div class="col-md-4">
                <div class="form-group">
                    <label for="">To Date :</label>
        <input type="date" name="to_date" id="cust_email" class="form-control" value="<?php echo $to_date ?>" disabled></div></div>


<div class="col-md-4">
                <div class="form-group">
                    <label for="">No of days :</label>
        <input type="text" name="days" id="email" class="form-control" value="<?php echo $days ?>" disabled></div></div></div>

<br>
<div class="row">
<div class="col-md-4">
                <div class="form-group">
                    <label for="">Booking Date:</label>
        <input type="date" name="book_date" id="email" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled></div></div></div><br>

<div class="row"> <div class="form-group">
                    <div class="col-md-6">

<span>Description About Problem:</span>
<input type="text" name="prblm_desc" class="form-control" pattern="[a-zA-Z\s]{0,50}" title="within 50 characters" required>
</div>
</div></div>
<br>

<div class="row"><div class="form-group">
                    <div class="col-md-6">

<span>Requester Name:</span>

<input type="text" name="requester_name" class="form-control" pattern="[a-zA-Z\s]{0,50}" title="within 50 characters" required>

</div>
</div></div>
<br>
<div class="row"><div class="form-group">
                    <div class="col-md-12">

<span>House Name:</span>

<input type="text" name="address" class="form-control" pattern="[a-zA-Z\s]{0,50}" title="within 50 characters" required>
</div>
</div></div>
<br>
<div class="row"><div class="form-group">
                    <div class="col-md-6">

<span>City:</span>

<input type="text" name="city" class="form-control" pattern="[a-zA-Z\s]{0,20}" title="within 20 characters" required>

</div>
</div>
          
            <div class="col-md-6">
                <div class="form-group">
                         <label for="">Landmark</label>
                         <label for="">Landmark</label>
                        
<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('area_id',array('class'=>'form-control'),$options); ?></td>
 <span class="valErr" style="color:red;"><?= $validator->error('area_id'); ?></span>

</div></div></div><div class="row">


<div class="form-group">
                    <div class="col-md-6">

<span>Contact No:</span>

<input type="text" name="contact_no" class="form-control"  title="Must be 10 digits ">

</div>
</div></div>
<br><div class="row">
<div class="col-md-6">
                <div class="form-group">
                    <label for="">Email :</label>
        <input type="text" name="cust_email" id="cust_email" class="form-control" value="<?php echo $name ?>" disabled></div></div>


<div class="col-md-6">
                <div class="form-group">
                    <label for="">customer Id  :</label>
        <input type="text" name="cust_id" id="cust_id" class="form-control" value="<?php echo $b ?>" disabled></div></div></div>

<br><br>
<div class="row">
      <div class="col-md-12">
        <div class="form-group">
          
          <input type="submit" name="btn_insert" value="Book Now!" class="btn btn-success btn-block" class="text-center p-5">
        </div>
      </div></div>

</tr></table>

</form>
</div></div></div></div></div>
</body>
</html>
<?php include("footer.php"); ?>
