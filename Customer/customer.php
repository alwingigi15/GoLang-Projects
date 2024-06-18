<?php 

 require('../config/autoload.php'); 
	include("./header.php");


$elements=array(
        "cust_firstname"=>"","cust_lastname"=>"","ssex"=>"","cdob"=>"","cust_address"=>"","cust_email"=>"","mobileno"=>"","password"=>"", "loc"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cust_firstname'=>"customer first Name",'cust_lastname'=>"customer last Name","ssex"=>"customer Gender","cdob"=>"date of birth","cust_address"=>"employee Address","cust_email"=>"email address","mobileno"=>"mobile number","password"=>"password","loc"=>"location" );

$rules=array(
    "cust_firstname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),  
	
	 "cust_lastname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
   
    "ssex"=>array("required"=>true,"exist"=>array("m","f")),
	
	"cdob"=>array("required"=>true),
	
	 "cust_address"=>array("required"=>true,"minlength"=>2,"maxlength"=>30),
	
	"cust_email"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
	
	 "mobileno"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
	
	"password"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
	
	 "loc"=>array("required"=>true)
	
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
	
if($validator->validate($_POST))
{
	
$data=array(

        'cust_firstname'=>$_POST['cust_firstname'],
	
	    'cust_lastname'=>$_POST['cust_lastname'],
      
        'cust_gender'=>$_POST['ssex'],
	
	    'cust_doj'=>$_POST['cdob'],
	   
	    'cust_address'=>$_POST['cust_address'],
	
	    'cust_email'=>$_POST['cust_email'],
	
	    'mobileno'=>$_POST['mobileno'],
	 
	    'pasword'=>$_POST['password'],
	
	    'area_id'=>$_POST['loc']
    );
  print_r($data);
    if($dao->insert($data,"customer"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:customer.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


?>
<html>
<head>
	<h1><u> CUSTOMER REGISTRATION</u></h1>
</head>
<body>

 <form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
First Name:

<?= $form->textBox('cust_firstname',array('class'=>'form-control')); ?>
<?= $validator->error('cust_firstname'); ?>

</div>
</div>
	 
	 <div class="row">
                    <div class="col-md-6">
Last Name:

<?= $form->textBox('cust_lastname',array('class'=>'form-control')); ?>
<?= $validator->error('cust_lastname'); ?>

</div>
</div>

	 
<div class="row">
                    <div class="col-md-6">
Gender:

<?php
                    $options=array('Male'=>"m","Female"=>"f");
                    echo $form->radioGroup('ssex',array(),$options); ?>
<?= $validator->error('ssex'); ?>

</div>
</div>

	 <div class="row">
                    <div class="col-md-6">
DOJ:

<?= $form->inputBox('cdob',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('cdob'); ?></span>

</div>
</div>
	 
	 
<div class="row">
                    <div class="col-md-6">
Address:

<?= $form->textBox('cust_address',array('class'=>'form-control')); ?>
<?= $validator->error('cust_address'); ?>

</div>
</div>

		 
	 <div class="row">
                    <div class="col-md-6">
Email id:

<?= $form->textBox('cust_email',array('class'=>'form-control')); ?>
<?= $validator->error('cust_email'); ?>

</div>
</div>
	 
	 
	 	 <div class="row">
                    <div class="col-md-6">
Mobile number:

<?= $form->textBox('mobileno',array('class'=>'form-control')); ?>
<?= $validator->error('mobileno'); ?>

</div>
</div>
	  
	 <div class="row">
                    <div class="col-md-6">
password:

<?= $form->textBox('password',array('class'=>'form-control')); ?>
<?= $validator->error('password'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Location:

<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('loc',array('class'=>'form-control'),$options); ?>
<?= $validator->error('loc'); ?>

</div>
</div>

<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>

