 <?php 

include("Rhead.php");

 require('../config/autoload.php'); 


$elements=array(
        "from_date"=>"","to_date"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("from_date"=>"from Date","to_date"=>"To Date" );

$rules=array(
    
    "from_date"=>array('required'=>true),
	
    "to_date"=>array('required'=>true,'datecompare'=>array('comparewith'=>'from_date','operator'=>'>=')),
 

      
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
	 
 $_SESSION['from_date']=$_POST['from_date'];

$_SESSION['to_date']=$_POST['to_date'];
	
//echo"<script> location.replace('datebetweenview.php'); </script>";
header('location.replace:datebetweenview.php');
       
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 
<br><br><br><br>

<div class="row">
                    <div class="col-md-6">
From Date:
<?= $form->inputBox('from_date',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('from_date'); ?></span>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
To Date:

<?= $form->inputBox('to_date',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('to_date'); ?></span>

</div>
</div><br>
<div class="row">
<div class="col-md-6">

<button type="submit" name="btn_insert"  class="btn btn-success">Submit</button></div></div>
</form>


</body>

</html>
<?php include("adfooter.php"); ?>