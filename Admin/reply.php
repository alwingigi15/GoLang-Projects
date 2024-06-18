


<?php require('../config/autoload.php'); ?>
<?php
	

include("adhead.php");
$dao=new DataAccess();
$info=$dao->getData('*','complaint','complaint_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "complaint_desc"=>$info[0]['complaint_desc'],"complaint_date"=>$info[0]['complaint_date'],"reply"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('complaint_desc'=>"Description of Complaint","complaint_date"=>"Date","reply"=>"Reply");

$rules=array(
    "complaint_desc"=>array("required"=>true),
    "complaint_date"=>array("required"=>true),
"reply"=>array("required"=>true,"alphaspaceonly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{


$data=array(

       
          'replay'=>$_POST['reply'],
          'complaint_status'=>'reply'
	
    );
  $condition='complaint_id='.$_GET['id'];

    

if($dao->update($data,'complaint',$condition))
    {
      
      echo "<script> alert('Replyed'); </script>";
    echo "<script> location.replace('viewcom.php'); </script>";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
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
<body><br><br><br>


	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
<span style="color: red">Description of Problem :</span>

<?= $form->textBox('complaint_desc',array('class'=>'form-control')); ?>
<?= $validator->error('complaint_desc'); ?>

</div>
</div>
<br>
<div class="row">
                    <div class="col-md-6">

<span style="color: red">Date:</span>
<?= $form->textBox('complaint_date',array('class'=>'form-control')); ?>
<?= $validator->error('complaint_date'); ?>

</div>
</div>
<br>

<div class="row">
                    <div class="col-md-6">
<span style="color: red">Reply:</span>

<?= $form->textBox('reply',array('class'=>'form-control')); ?>
<?= $validator->error('reply'); ?>

</div>
</div>


<br>
<button type="submit" name="btn_update"  class="btn btn-success">Reply</button>
</form>

</body>
</html>
<?php include("adfooter.php"); ?>