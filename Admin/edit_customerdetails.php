<?php require('../config/autoload.php'); ?>
<?php
	

include("./header.php");
$dao=new DataAccess();
$info=$dao->getData('*','customer','cust_id='.$_GET['id']);

$elements=array(
        "cust_firstname"=>$info[0]['cust_firstname'],"cust_lastname"=>$info[0]['cust_lastname'],"ssex"=>$info[0]['cust_gender'],"cage"=>$info[0]['cust_age'],"cust_address"=>$info[0]['cust_address'],"cust_email"=>$info[0]['cust_email'],"area_id"=>$info[0]['area_id'],"mobileno"=>$info[0]['mobileno']);

	$form = new FormAssist($elements,$_POST);

$labels=array('cust_firstname'=>"customer first Name",'cust_lastname'=>"customer last Name","ssex"=>"customer Gender","cage"=>"customer age","cust_address"=>"customer Address","cust_email"=>true,"unique"=>array("field"=>"cust_email","table"=>"customer"),"mobileno"=>"mobile number","area_id"=>"location");

$rules=array(
  "cust_firstname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),  
	
	 "cust_lastname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
   
    "ssex"=>array("required"=>true,"exist"=>array("m","f")),
	
	"cage"=>array("required"=>true,"minlength"=>1,"maxlength"=>30),
	
	 "cust_address"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
	
	"cust_email"=>array("required"=>true),
	
    "mobileno"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
			 
     "area_id"=>array("required"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

       'cust_firstname'=>$_POST['cust_firstname'],
	
	    'cust_lastname'=>$_POST['cust_lastname'],
      
        'cust_gender'=>$_POST['ssex'],
	
	    'cust_age'=>$_POST['cage'],
	   
	    'cust_address'=>$_POST['cust_address'],
	
	    'cust_email'=>$_POST['cust_email'],
	
	    'mobileno'=>$_POST['mobileno'],
				
	    'area_id'=>$_POST['area_id']
	
    );
  $condition='cust_id='.$_GET['id'];

    if($dao->update($data,'customer',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewcustomerdetails.php');
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
 
 
		
					<p><?php if(isset($msg)) echo $msg; ?></p>
                    <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">First Name</label><br>
                
                   <?= $form->textBox('cust_firstname',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cust_firstname'); ?></span>
                               
                               
                        </div></div>
		
		
                        <div class="col-md-6">
                <div class="form-group">
                          <label for="">Last Name</label><br>
                        
                             <?= $form->textBox('cust_lastname',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cust_lastname'); ?></span>
                               
                        </div></div><br>
                        
                        
            <div class="col-md-4">
                <div class="form-group">
                         <label for="">Gender</label><br>
                        <?php
                        $options=array('Male'=>"m",'Female'=>"f" );
                        echo $form->radioGroup('ssex',array(),$options); ?>
                        <span class="valErr" style="color:red;"><?= $validator->error('ssex'); ?></span>

                               
                               
                        </div></div>
				
				
	  <div class="col-md-6">
                <div class="form-group">
                          <label for="">AGE</label><br>
                        
                             <?= $form->textBox('cage',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cage'); ?></span>
                               
                        </div></div><br>
					
					
					<div class="row">
                         <div class="col-md-6">
                <div class="form-group">
                         <label for="">Address</label><br>
                             <?= $form->textArea('cust_address',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cust_address'); ?></span>
                               
                               
                        </div></div>
						
                        <div class="col-md-4">
                <div class="form-group">
                      <label for="">Contact Number</label><br>
                            
                            <input type="text" name="mobileno" class="form-control">
                           <span class="valErr" style="color:red;"><?= $validator->error('mobileno'); ?></span>
                               
                               
                        </div></div>
                        
                       
                        
            <div class="col-md-6">
                <div class="form-group">
                         <label for="">Area Name</label>
                        
<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('area_id',array('class'=>'form-control'),$options); ?></td>
 <span class="valErr" style="color:red;"><?= $validator->error('area_id'); ?></span>

</div></div></div><div class="row">
            <div class="col-md-4">
                <div class="form-group">
                         <label for="">Email</label><br>

                        <?= $form->textBox('cust_email',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cust_email'); ?></span>
                               
                               
                        </div></div></div>


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