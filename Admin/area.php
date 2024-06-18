<?php

 require('../config/autoload.php');
include("adhead.php");

$file=new FileUpload();
$elements=array(
        "area_name"=>"","area_img"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('area_name'=>"location",'area_img'=>"area image");

$rules=array(
    "area_name"=>array("required"=>true),
	"area_img"=>array('filerequired'=>true),
	
     
);
   
   
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
if($fileName=$file->doUploadRandom($_FILES['area_img'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
{
$data=array(

        'area_name'=>$_POST['area_name'],
	
	    'area_img'=>$fileName,
	 
       
         
    );
 
    if($dao->insert($data,"area"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:area.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
   
}
	
}

}

 elseif (isset($_POST["btn_view"])) {
    
         echo "<script> location.replace('viewmanagearea.php'); </script>";
}


?>
<html>

<body>

 
<div class="jumbotron">
        <div class="container">
           <div id="news" class="w3ls-section">
        <div class="container">
            <h4 class="main-title" class="text-center p-5"> Add Area  </h4><br>
 <form action="" method="POST" enctype="multipart/form-data" >
  
 

	 
	 
<div class="row">
                    <div class="col-md-6">
Location:

<?= $form->textBox('area_name',array('class'=>'form-control')); ?>
<?= $validator->error('area_name'); ?>

</div>
</div>
	 
	 <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
<label for="">area Image :</label>

<?= $form->fileField('area_img',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('area_img'); ?></span>

</div>
</div></div>

	

<button type="submit" name="btn_insert" class="btn btn-success" >Submit</button>
<input type="submit" name="btn_view" class="btn btn-success" value="View Area"/>
</form>


</body>

</html>

