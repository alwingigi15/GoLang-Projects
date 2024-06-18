


<?php require('../config/autoload.php'); ?>
<?php
	

include("adhead.php");
$dao=new DataAccess();
$info=$dao->getData('*','area','area_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "area_name"=>$info[0]['area_name'],"area_img"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('area_name'=>"Home Service Name","area_img"=>"Description");

$rules=array(
    "area_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "area_img"=>array("required"=>true),

   
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{


if(isset($_FILES['area_img']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['area_img'],array('.jpg','.png','.jpeg'),500000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

        'area_name'=>$_POST['area_name'],
        
           
	
	
    );
  $condition='area_id='.$_GET['id'];
if(isset($flag))
			{	$data['area_img']=$fileName;
		
			}
    

if($dao->update($data,'area',$condition))
    {
        
    	  echo '<script> alert("Locations Updated"); </script> ';
        
    echo "<script> location.replace('viewmanagearea.php'); </script>";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
//}


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
<span style="color: red">Location Name:</span>

<input type="text" name="area_name" value="<?php echo $info[0]['area_name']; ?>" required class="form-control" pattern="[a-zA-Z\s]{0,20}" title="With in 20 Characters" >
<?= $validator->error('area_name'); ?>

</div>
</div>
<br>


<div class="row">
                    <div class="col-md-6">
<span style="color: red">Image:</span>


<?= $form->fileField('area_img',array('class'=>'form-control')); ?>

</div>
</div>


<br>

<input type="submit" name="btn_update"  class="btn btn-success" value="Update Area">
</form>

</body>
</html>
