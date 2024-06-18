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
                <span>employee  Registration </span>
            </span>
        </div>
    </div>

<?php
require('../config/autoload.php'); 
	
	$file=new FileUpload();
$elements=array("emp_firstname"=>"","emp_lastname"=>"","emp_address"=>"","area"=>"","gender"=>"","dob"=>"","age"=>"","city"=>"","phno"=>"","emp_img"=>"","emp_email"=>"","emp_password"=>"","cpass"=>"","catid"=>"","qualifi"=>"","emp_exp"=>"","emp_desc"=>"");


$form=new FormAssist($elements,$_POST);
	
$dao=new DataAccess();
	
	
$labels=array("emp_firstname"=>"employee firstname","emp_lastname"=>"employee lastname","emp_address"=>"addrress","area"=>"location","gender"=>"gender","dob"=>"dob","age"=>"age","city"=>"city","phno"=>"mobile no","emp_img"=>"image of employee","emp_email"=>"email id","emp_password"=>"password","cpass"=>"confirm passwrod","catid"=>"job id","qualifi"=>"qualification","emp_exp"=>"experience","emp_desc"=>"descripition");

$rules=array("emp_firstname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	
	 "emp_lastname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	
    "emp_address"=>array("required"=>true,"minlength"=>2,"maxlength"=>30),
	
   "gender"=>array("required"=>true,"exist"=>array("m","f")),
	
	"dob"=>array("required"=>true),
	
	"age"=>array("required"=>true,"minlength"=>2,"maxlength"=>2,"integeronly"=>true),
	
	"area"=>array("required"=>true),
	
	"city"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	
	
	 "phno"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
	
	 "emp_img"=>array('filerequired'=>true),
	"emp_email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"emp_email","table"=>"employee")),
	
	"emp_password"=>array("required"=>true,"minlength"=>3,"maxlength"=>10,"unique"=>array("field"=>"emp_password","table"=>"employee")),
    "cpass"=>array("required"=>true,"minlength"=>3,"maxlength"=>10,"compare"=>array("comparewith"=>"emp_password","operator"=>"=")),
	
	 "catid"=>array("required"=>true),
	
	"emp_exp"=>array("required"=>true,"minlength"=>1,"maxlength"=>30),
	
	 "emp_desc"=>array("required"=>true,"minlength"=>1,"maxlength"=>30),
			 
	// "qualifi"=>array("required"=>true,"minlength"=>3,"maxlength"=>50),
	
	 //"status"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	
);
	
  
$validator = new FormValidator($rules,$labels);
	
	//$rdate=date('Y-m-d',time());

if(isset($_POST["register"]))
{
if($validator->validate($_POST))
{
if($fileName=$file->doUploadRandom($_FILES['emp_img'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
{
   
	
       $data=array(  
		
        'emp_firstname'=>$_POST['emp_firstname'],
		   
		'emp_lastname'=>$_POST['emp_lastname'],
	
       'emp_address'=>$_POST['emp_address'],
	
	   'area_id'=>$_POST['area'],
	
        'gender'=>$_POST['gender'],
	
	    'dob'=>$_POST['dob'],
	
	   'Age'=>$_POST['age'],
	
	    'city'=>$_POST['city'],
	
	    'phn_no'=>$_POST['phno'],
	
	  'emp_img'=>$fileName,
	
	  //'doj'=>date('Y-m-d'),
	
	   'emp_email'=>$_POST['emp_email'],
	
	     'emp_password'=>$_POST['emp_password'],
	
	     'catid'=>$_POST['catid'],
	
	     'emp_exp'=>$_POST['emp_exp'],
	
	    'emp_desc'=>$_POST['emp_desc'],
		   
		 //'qualifi'=>$_POST['qualifi'],
	
	   'emp_avail'=>'available',
	
	  //'status'=>$_POST['status'],
		   
		  'status'=>'A',
	
	    'pay_status'=>'pending',
			
			);
 if($dao->insert($data,"employee"))
    {
        echo "<script> alert('Welcome');</script> ";
        $msg="Registration Success";
header('location:emp_register.php');
    }
    else
        {
		$msg="Registration failed";
	    } 
	?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
	
}

}


?>

<div class="jumbotron">
        <div class="container">
           <div id="news" class="w3ls-section">
        <div class="container">
            <h4 class="main-title" class="text-center p-5"> Employee Registration  </h4><br>
			
			
            <form action="" method="POST" enctype="multipart/form-data">
                    
                    
 <br>
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
<label for="">First Name:</label>

<?= $form->textBox('emp_firstname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('emp_firstname'); ?></span>

</div>
</div>

               <div class="col-md-6">
                    <div class="form-group">
<label for="">Last Name:</label>

<?= $form->textBox('emp_lastname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('emp_lastname'); ?></span>

</div>
</div></div>
				
				         <div class="row">
                      <div class="col-md-6">
                    <div class="form-group">
<label for="">Address :</label>

<?= $form->textArea('emp_address',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('emp_address'); ?></span>

</div>
</div>
							
							
                          <div class="col-md-4">
                    <div class="form-group">
<label for="">Gender :</label><br>

                        <?php
                        $options=array('Male'=>"m",'Female'=>"f" );
                        echo $form->radioGroup('gender',array(),$options); ?>
                        <span style="color:red;"><?= $validator->error('gender'); ?></span>

                               </div></div></div><br> 
				
				
	
                      <br>
				
						<div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
<label for="">Date of Birth :</label>

<input type="date" name="dob" class="form-control" id="dob">
<span style="color:red;"><?= $validator->error('dob'); ?></span>

</div>
</div>				
				
					
					        <div class="col-md-4">
                    <div class="form-group">
<label for="">Age :</label>
<input type="text" name="age" class="form-control">
<span style="color:red;"><?= $validator->error('age'); ?></span>

</div>
</div>
							
												                      
<div class="row">
                     <div class="col-md-6">
                    <div class="form-group">
<label for="">Location Name:</label><br>

<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('area',array('class'=>'form-control'),$options); ?>
<span class="valErr" style="color:red;"><?= $validator->error('area'); ?></span>

</div></div>
	
	
                    <div class="col-md-6">
                    <div class="form-group">
<label for="">City:</label>


<?= $form->textBox('city',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('city'); ?></span>

</div>
</div></div>
<br>
					
					
  <div class="col-md-6">
                    <div class="form-group">
<label for="">Contact No:</label>


<input type="text" name="phno" class="form-control">
<span style="color:red;"><?= $validator->error('phno'); ?></span>

</div>
</div></div>
				
				
<br>
<div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
<label for="">Profile Image :</label>



<?= $form->fileField('emp_img',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('emp_img'); ?></span>

</div>
</div></div>
		
   			
				
				<div class="col-md-6">
                    <div class="form-group">
<label for="">Enter your email :</label>

                             <?= $form->textBox('emp_email',array('class'=>'form-control',"placeholder"=>"enter your email")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('emp_email'); ?></span>
                               
                               
                        </div></div></div><br>   
			
			                
<div class="row">
                     <div class="col-md-12">
                    <div class="form-group">
<label for="">Create Password:</label>

                            <?= $form->passwordbox('emp_password',array('class'=>'form-control',"placeholder"=>"create password")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('emp_password'); ?></span>
                               
                               </div></div></div>
                               <div class="row">
                        
                            <div class="col-md-12">
                    <div class="form-group">
<label for="">Confirm Password:</label><br>

                             <?= $form->passwordbox('cpass',array('class'=>'form-control',"placeholder"=>"confirm password")); ?>
                           <span class="valErr" style="color:red;"><?= $validator->error('cpass'); ?></span>
                               
                        </div></div></div><br>
			
		<br>	
						
  <div class="col-md-6">
                    <div class="form-group">
<label for="">Home service Name:</label><br>

<?php
                    $options = $dao->createOptions('categoryname','catid',"category");
                    echo $form->dropDownList('catid',array('class'=>'form-control'),$options); ?>
<span class="valErr" style="color:red;"><?= $validator->error('catid'); ?></span>

</div></div></div><br>

			   			   
  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
<label for="">Description About You:</label><br>

<?= $form->textArea('emp_desc',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('emp_desc'); ?></span>

</div>
</div></div>
			   
			   			     
<br>
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
<label for="">Experience:</label><br>

<select name="emp_exp" class="form-control" required>
    <option value="select">--Select--</option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2-5">2-5</option>
     <option value="5-10">5-10</option>
 
</select>
<span style="color:red;"><?= $validator->error('emp_exp'); ?></span>

</div>
</div>
	     
	
			

                         
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




