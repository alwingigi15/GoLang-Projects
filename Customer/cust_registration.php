<?php include("header.php");?> 
<!DOCTYPE html>
<html lang="en">



<head>



</head>

<body>
<div class="breadcrumbs-w3l">
        <div class="container">
            <span class="breadcrumbs">
                <a href="index.php">Home</a>
                <span>Customer Registration </span>
            </span>
        </div>
    </div>

<?php
require('../config/autoload.php'); 


$dao=new DataAccess();
$elements=array("cust_firstname"=>"","cust_lastname"=>"","ssex"=>"","cage"=>"","cust_address"=>"","cust_email"=>"","mobileno"=>"","loc"=>"","password"=>"","cpass"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('cust_firstname'=>"customer first Name",'cust_lastname'=>"customer last Name","ssex"=>"customer Gender","cage"=>"customer age","cust_address"=>"customer Address","cust_email"=>"email address","mobileno"=>"mobile number","loc"=>"location","password"=>"password","cpass"=>"Confirm Password");

$rules=array("cust_firstname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),  
	
	 "cust_lastname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
   
    "ssex"=>array("required"=>true,"exist"=>array("m","f")),
	
	"cage"=>array("required"=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
	
	 "cust_address"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
	
	"cust_email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"cust_email","table"=>"customer")),
	
    "mobileno"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
			 
     "loc"=>array("required"=>true),
   
	
	 "password"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"unique"=>array("field"=>"password","table"=>"customer")),
			 
	 "cpass"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"compare"=>array("comparewith"=>"password","operator"=>"="))
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				 'cust_firstname'=>$_POST['cust_firstname'],
	
	    'cust_lastname'=>$_POST['cust_lastname'],
      
        'cust_gender'=>$_POST['ssex'],
	
	    'cust_age'=>$_POST['cage'],
	   
	    'cust_address'=>$_POST['cust_address'],
	
	    'cust_email'=>$_POST['cust_email'],
	
	    'mobileno'=>$_POST['mobileno'],
			
	    
	 
	    'password'=>$_POST['password'],
			
	    'area_id'=>$_POST['loc'],
	
	   
			
			
			);
			if($dao->insert($data,'customer'))
			{
				//$msg="Inserted Successfully";
                echo "<script> alert('Successfully Registred.. ');</script> ";
   echo"<script> location.replace('cust_login.php'); </script>";
			}
			else
				//$msg="insertion failed";
                 echo "<script> alert('Registration Failed');</script> ";
		}
		
		
		
		
    }



?>




<div class="jumbotron">
        <div class="container">
           <div id="news" class="w3ls-section">
        <div class="container">
            <h4 class="main-title" class="text-center p-5"> Customer Registration  </h4><br>
            <form action="" method="POST">
                    
                    
				
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
                               
                        </div></div></div><br>
                        
                        
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
                               
                        </div></div></div><br>
					
					
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
                               
                               
                        </div></div></div>
                        
                       
                        
            <div class="col-md-6">
                <div class="form-group">
                         <label for="">Area Name</label>
                        
<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('loc',array('class'=>'form-control'),$options); ?></td>
 <span class="valErr" style="color:red;"><?= $validator->error('loc'); ?></span>

</div></div></div><div class="row">
            <div class="col-md-4">
                <div class="form-group">
                         <label for="">Email</label><br>

                        <?= $form->textBox('cust_email',array("class"=>"form-control")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cust_email'); ?></span>
                               
                               
                        </div></div>

                        
            <div class="col-md-4">
                <div class="form-group">
                         <label for="">Create Password</label><br>
                          <?= $form->passwordbox('password',array("placeholder"=>"create password","class"=>"form-control")); ?></td>
                           <span class="valErr" style="color:red;"><?= $validator->error('password'); ?></span>
                               
                               </div></div>
                        
                       
            <div class="col-md-4">
                <div class="form-group">
                         <label for="">Confirm Password</label><br>
                         <?= $form->passwordbox('cpass',array("placeholder"=>"confirm password","class"=>"form-control")); ?></td>
                           <span class="valErr" style="color:red;"><?= $validator->error('cpass'); ?></span>
                               
                        </div></div></div>                        
                        
                      <br>
                         
                        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="submit" name="register" value="Register" class="btn btn-success btn-block btn-primary" class="text-center p-5">
                </div>
            </div></div>

                    </form>
                </div></div>
        </div>
    </div>

    
</body>
</html>

<?php include("footer.php");?> 




