<?php

 require('../config/autoload.php');
include("adhead.php");

$file=new FileUpload();
$elements=array(
        "catname"=>"","cat_desc"=>"","cat_image"=>"","reg_fee"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('catname'=>"category",'cat_desc'=>"job description",'cat_image'=>"job image");//'reg_fee'=>"registration fee");

$rules=array(
    "catname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
	 "cat_desc"=>array("required"=>true,"minlength"=>3,"maxlength"=>100,"alphaonly"=>true),
	 "cat_image"=>array('filerequired'=>true),
	 //"reg_fee"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
     
);
   
   
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
if($fileName=$file->doUploadRandom($_FILES['cat_image'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
{
    
$data=array(

        'categoryname'=>$_POST['catname'],
	 'cat_desc'=>$_POST['cat_desc'],
	 'cat_image'=>$fileName,
	// 'reg_fee'=>$_POST['reg_fee']
       
         
    );
 
    if($dao->insert($data,"category"))
    {
        echo '<script> alert("Services Created"); </script> ';
        //$msg="Registration Success";
//header('location:manage_add_jobs.php');
    echo "<script> location.replace('category.php'); </script>";
	}
    else
        {$msg="Registration failed";}
?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
   
}

}
}
elseif (isset($_POST["btn_view"])) 
{
     
      echo "<script> location.replace('viewmanagejobs.php'); </script>";
}


?>
<html>

<body>

<div class="jumbotron">
        <div class="container">
           <div id="news" class="w3ls-section">
        <div class="container">
            <h4 class="main-title" class="text-center p-5"> Add Jobs  </h4><br>
 <form action="" method="POST" enctype="multipart/form-data" >
  
<div class="row">
                    <div class="col-md-6">
Job Name:

<?= $form->textBox('catname',array('class'=>'form-control')); ?>
<?= $validator->error('catname'); ?>

</div>
</div>
	 
	 
	 	 
<div class="row">
                    <div class="col-md-6">
Job Descripition:

<?= $form->textBox('cat_desc',array('class'=>'form-control')); ?>
<?= $validator->error('cat_desc'); ?>

</div>
</div>
	 
	<div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
<label for="">job Image :</label>



<?= $form->fileField('cat_image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cat_image'); ?></span>

</div>
</div></div>
	 
	

<button type="submit" name="btn_insert" class="btn btn-success" >Submit</button>
	 
<input type="submit" name="btn_view"  class="btn btn-success" value="View Services"/>
</form>
			</div>
			</div>
	</div>


</body>

</html>

