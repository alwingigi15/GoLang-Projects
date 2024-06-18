<?php require('../config/autoload.php'); ?>
<?php
	

include("./header.php");
$dao=new DataAccess();
$info=$dao->getData('*','booking','book_id='.$_GET['id']);

$elements=array(
        "cust_id"=>$info[0]['cust_id'],"prblm_desc"=>$info[0]['prblm_desc'],"book_date"=>$info[0]['book_date'],"area_id"=>$info[0]['area_id'],"contact_no"=>$info[0]['contact_no']);

	$form = new FormAssist($elements,$_POST);

$labels=array('cust_id'=>"customer id","prblm_desc"=>"problem descripition","book_date"=>"booking date","area_id"=>"location","contact_no"=>"mobile number" );

$rules=array(
  "cust_id"=>array("required"=>true),
	
	"prblm_desc"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	
	 "book_date"=>array("required"=>true),
	
	"area_id"=>array("required"=>true),
	
	"contact_no"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'cust_id'=>$_POST['cust_id'],
	
	 'prblm_desc'=>$_POST['prblm_desc'],
	
	    'book_date'=>$_POST['book_date'],
	
	 'area_id'=>$_POST['area_id'],
	
	  'contact_no'=>$_POST['contact_no'],
    );
  $condition='book_id='.$_GET['id'];

    if($dao->update($data,'booking',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewcust_booking.php');
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
<body>


 <div class="jumbotron">
        <div class="container">
            <div id="news" class="w3ls-section">
    <div class="container">
      <h4 class="main-title" class="text-center p-5">  </h4><br>
            <form action="" method="POST" enctype="multipart/form-data">
 
 <br>
	<form action="" method="POST" >
 
 
	<div class="col-md-6">
                    <div class="form-group">
<label for="">customer name:</label><br>

<?php
                    $options = $dao->createOptions('cust_firstname','cust_id',"customer");
                    echo $form->dropDownList('cust_id',array('class'=>'form-control'),$options); ?>
<span class="valErr" style="color:red;"><?= $validator->error('cust_id'); ?></span>
	
						</div>
		</div>
		
		<div class="row">
                    <div class="col-md-6">
problem description:

<?= $form->textBox('prblm_desc',array('class'=>'form-control')); ?>
<?= $validator->error('prblm_desc'); ?>

</div>
</div>
		
		
			 <div class="row">
                    <div class="col-md-6">
Book date:

<?= $form->inputBox('book_date',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('book_date'); ?></span>

</div>
</div>
		
		
		 
 <div class="row">
                    <div class="col-md-6">
Location:

<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('area_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('area_id'); ?>

</div>
</div>
		
		
		 
	 <div class="row">
                    <div class="col-md-6">
phone number:

<?= $form->textBox('contact_no',array('class'=>'form-control')); ?>
<?= $validator->error('contact_no'); ?>

</div>
</div>

 <br>
	 
<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="submit" name="btn_update" value="update" class="btn btn-success btn-block" class="text-center p-5">
                </div>
            </div></div></div>
</form></div></div>

</body>
</html>