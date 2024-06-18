


<?php require('../config/autoload.php'); ?>
<?php
	

include("adhead.php");
$dao=new DataAccess();
$info=$dao->getData('*','category','catid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "categoryname"=>$info[0]['categoryname'],"cat_desc"=>$info[0]['cat_desc'],"cat_image"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('categoryname'=>"Home Service Name","cat_desc"=>"Description","cat_image"=>"Image","reg_fee"=>"Registration Fess");

$rules=array(
    "categoryname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cat_desc"=>array("required"=>true,"minlength"=>2,"maxlength"=>500),

   
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['cat_image']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['cat_image'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

        'categoryname'=>$_POST['categoryname'],
        'cat_desc'=>$_POST['cat_desc'],
         
           
	
	
    );
  $condition='catid='.$_GET['id'];
if(isset($flag))
			{	$data['cat_image']=$fileName;
		
			}
    

if($dao->update($data,'category',$condition))
    {
        
    	  echo '<script> alert("Services Updated"); </script> ';
       
    echo "<script> location.replace('viewmanagejobs.php'); </script>";

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
<br><br><br>

	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
<span style="color: red">Home Service Name:</span>

<?= $form->textBox('categoryname',array('class'=>'form-control')); ?>
<?= $validator->error('categoryname'); ?>

</div>
</div>
<br>
<div class="row">
                    <div class="col-md-6">

<span style="color: red">Description:</span>
<?= $form->textArea('cat_desc',array('class'=>'form-control')); ?>
<?= $validator->error('cat_desc'); ?>

</div>
</div>
<br>

<div class="row">
                    <div class="col-md-6">
<span style="color: red">Image:</span>


<?= $form->fileField('cat_image',array('class'=>'form-control')); ?>

</div>
</div>
<br>


<button type="submit" name="btn_update"  class="btn btn-success">Update Services</button>
</form>

</body>
</html>
