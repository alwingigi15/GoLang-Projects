<?php $conn = new mysqli("localhost","root", "", "project"); ?>

<?php
  

include("cust_profile.php");?>
<div class="breadcrumbs-w3l">
    <div class="container">
      <span class="breadcrumbs">
        <a href="index.php">Home</a> |
        <span>Make Review And Rating </span>
      </span>
    </div>
  </div>


<?php require('../config/autoload.php'); 

$dao=new DataAccess();
$info=$dao->getData('*','booking','book_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cust_id"=>$info[0]['cust_id'],"emp_id"=>$info[0]['emp_id'],"rating1"=>"","rating2"=>"","comment"=>"","re_date"=>"",);

  $form = new FormAssist($elements,$_POST);

$labels=array('cust_id'=>"Client Id ","emp_id"=>"Employee Id ","rating1"=>"Over all","rating2"=>"Handyman","comment"=>"Comment","re_date"=>"Date");

$rules=array(
    "cust_id"=>array("required"=>true),
    "emp_id"=>array("required"=>true),
"rating1"=>array("required"=>true),
"rating2"=>array("required"=>true),

"comment"=>array("required"=>true,"alphaspaceonly"=>true),
"re_date"=>array("required"=>true),


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

//echo $POST["ename"];


$cust_id = $_POST["cust_id"];
$emp_id = $_POST["emp_id"];
$rating1= $_POST["rating1"];
$rating2= $_POST["rating2"];
$comment= $_POST["comment"];
//$cancel_date = $_POST["cancel_date"];
$re_date=date('Y-m-d',time());

$sql1 = "INSERT INTO review(cust_id,emp_id,rate_1,rate_2,comment,re_date) VALUES ('$cust_id','$emp_id','$rating1','$rating2','$comment','$re_date')";

$conn->query($sql1);
    
    
  // echo $sql;
 //header('location:viewcart.php');
echo "<script>alert('Thankyou for your valuable reviews!!'); </script>";
echo"<script >location.href = 'profile.php'</script>";


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Feedback Form </title>

    <meta name="author" content="Codeconvey" />
    
    <link rel="stylesheet" href="style.css">
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="demo.css" />
	
</head>
<body>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        
    </div>
</div>

    <div class="container">
<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	
<div id="news" class="w3ls-section">
    <div class="container">
      <h4 class="main-title" class="text-center p-5"> Make Review And Rating  </h4><br>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
      
<div class="feedback">
<br>
<p>Dear Customer,<br>
Thank you for getting your booking at our website. We would like to know how we performed. Please spare some moments to give us your valuable feedback as it will help us in improving our service.</p><br>

<h4>Please rate your service experience for the following parameters</h4>


<form action="" method="POST" enctype="multipart/form-data" >
 <input type="text" name="cust_id" value="<?php echo $info[0]["cust_id"];  ?>" hidden >
  <input type="text" name="emp_id" value="<?php echo $info[0]["emp_id"];  ?>" hidden >
<input type="text" name="book_id" value="<?php echo $info[0]["book_id"];  ?>" hidden>

<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
<label><h6>1. Your overall experience with us ?</h6></label><br>
  
<span class="star-rating" required class="form-control">
  <input type="radio" name="rating1" value="1"><i></i>
  <input type="radio" name="rating1" value="2"><i></i>
  <input type="radio" name="rating1" value="3"><i></i>
  <input type="radio" name="rating1" value="4"><i></i>
  <input type="radio" name="rating1" value="5"><i></i>
</span></div></div></div><br>
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
  <div class="clear"></div> 
  <hr class="survey-hr">
<label><h6>2. Experience with our Employee </h6></label><br>
<span class="star-rating" required class="form-control">
  <input type="radio" name="rating2" value="1"><i></i>
  <input type="radio" name="rating2" value="2"><i></i>
  <input type="radio" name="rating2" value="3"><i></i>
  <input type="radio" name="rating2" value="4"><i></i>
  <input type="radio" name="rating2" value="5"><i></i>
</span></div></div></div><br>


  
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
  <div class="clear"></div> 
  <hr class="survey-hr"> 
<label for="m_3189847521540640526commentText"><h6>3. Any Other suggestions:</h6></label><br/><br/>
<h6><textarea cols="75" name="comment" rows="5" style="100%" class="form-control" required pattern="[a-zA-Z\s]{0,50}" title="within 50 characters "></textarea></h6><br>
</div></div></div><br>
<div class="row">
                    <div class="col-md-6">
<span>Date:</span>

<input type="date" name="re_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">

</div>
</div>


<br><br>
<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="submit" name="insert" value="Submit Your Review  " class="btn btn-success btn-block" class="text-center p-5">
                </div>
            </div>
                  
           
    		</form></div></div></div></div></div></div></div></div></div></div></div></section></body></html>
        <?php include("footer.php"); ?>