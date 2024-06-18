<script>
  function printData()
  {
    var divToPrint=document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();

  }
</script>
<?php require('../config/autoload.php'); ?>
<?php
include("adhead.php");
$dao=new DataAccess();
$info=$dao->getData('*','employee','emp_id='.$_GET['id']);
$file=new FileUpload();
//$file=new FileUpload();
$elements=array(
        "emp_firstname"=>$info[0]['emp_firstname'],"emp_lastname"=>$info[0]['emp_lastname'],"dob"=>$info[0]['dob'],"Age"=>$info[0]['Age'],"gender"=>$info[0]['gender'],"emp_address"=>$info[0]['emp_address'],"city"=>$info[0]['city'],"phn_no"=>$info[0]['phn_no'],"emp_img"=>$info[0]['emp_img'],"emp_email"=>$info[0]['emp_email'],"area_id"=>$info[0]['area_id'],"catid"=>$info[0]['catid'],"emp_desc"=>$info[0]['emp_desc'],"emp_exp"=>$info[0]['emp_exp']);

$form=new FormAssist($elements,$_POST);

//$dao=new DataAccess();

$labels=array("emp_firstname"=>"First Name","emp_lastname"=>"Last Name","dob"=>"Date of Birth","age"=>"Age","gender"=>"Gender","emp_address"=>"House Name","city"=>"City","phone"=>"Phone","emp_image"=>"Image","doj"=>"Date of Joining","emp_email"=>"Email","area_id"=>"location Name","catid"=>"Home Service Name","emp_desc"=>"Description","emp_exp"=>"Experience");

$rules=array(
    "emp_firstname"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaspaceonly"=>true),
	
    "emp_lastname"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaspaceonly"=>true),
	
    "dob"=> array('required'=>true,'date'=>array('from'=>'01-01-1970','to'=>'01-01-1999')),
	
    "age"=>array("required"=>true,"minlength"=>2,"maxlength"=>2,"integeronly"=>true),
   
    "gender"=>array("required"=>true,"exist"=>array("m","f")),
	
    "emp_address"=>array("required"=>true,"minlength"=>3,"maxlength"=>50,"alphaspaceonly"=>true),
	
     "city"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaspaceonly"=>true),
	
    "phn_no"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
	
    "emp_img"=> array('filerequired'=>true),
	
    "emp_email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"emp_email","table"=>"employee")),
     
    "area_id"=>array("required"=>true),
   
    "catid"=>array("required"=>true),
	
    "emp_desc"=>array("required"=>true,"minlength"=>3,"maxlength"=>100),
	
     "emp_exp"=>array("required"=>true,"minlength"=>3,"maxlength"=>50),
	
       

);






    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

$data=array(

         'emp_firstname'=>$_POST['emp_firstname'],
    'emp_lastname'=>$_POST['emp_lastname'],
    'dob'=>$_POST['dob'],
    'Age'=>$_POST['age'],
    'gender'=>$_POST['gender'],
    'emp_addresss'=>$_POST['emp_addresss'],
    'city'=>$_POST['city'],
   
    'phn_no'=>$_POST['phn_no'],
    'emp_img'=>$fileName,

'emp_email'=>$_POST['emp_email'],
'emp_password'=>$_POST['emp_password'],
'area_id'=>$_POST['area_id'],
'catid'=>$_POST['catid'],
'emp_desc'=>$_POST['emp_desc'],
'emp_exp'=>$_POST['emp_exp'],

'reg_fee'=>1,
'emp_avail'=>"pending",
'status'=>"pending",  
    );
  $condition='emp_id='.$_GET['id'];
 ?></span>

<?php
    
}


}

if(isset($_POST['back']))
{
  header('location:view_approved_employees.php');
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
<br><br><br><div class="container">

            <h2 class="text-center p-5"><hr><U>Employee Personal Details</U></h2>
            <form action="" method="POST" enctype="multipart/form-data">
 
 <br>
 <img style="width:300px" src=<?php echo BASE_URL."uploads/".$info[0]["emp_img"]; ?> alt=" " class="img-responsive" /><br>
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
<label for="">First Name:</label>


<input type="text" value="<?php echo $info[0]['emp_firstname']; ?>" disabled class="form-control">

</div>
</div>

                    <div class="col-md-6">
                    <div class="form-group">
<label for="">Last Name:</label>

<input type="text" value="<?php echo $info[0]['emp_lastname']; ?>" disabled class="form-control">

</div>
</div></div>
<br>
<div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
<label for="">Date of Birth :</label>

<input type="text" value="<?php echo $info[0]['dob']; ?>" disabled class="form-control">

</div>
</div>

                   <div class="col-md-4">
                    <div class="form-group">
<label for="">Age :</label>

<input type="text" value="<?php echo $info[0]['Age']; ?>" disabled class="form-control">

</div>
</div>

                          <div class="col-md-4">
                    <div class="form-group">
<label for="">Gender :</label><br>

                       <input type="text" value="<?php echo $info[0]['gender']; ?>" disabled class="form-control">
                               
                               
                        </div></div></div><br>
                        <div class="row">
                      <div class="col-md-6">
                    <div class="form-group">
<label for="">Housename :</label>

<input type="text" value="<?php echo $info[0]['emp_address']; ?>" disabled class="form-control">

</div>
</div>


                    <div class="col-md-6">
                    <div class="form-group">
<label for="">City:</label>


<input type="text" value="<?php echo $info[0]['city']; ?>" disabled class="form-control">

</div>
</div></div>


  <div class="col-md-6">
                    <div class="form-group">
<label for="">Contact No:</label>


<input type="text" value="<?php echo $info[0]['phn_no']; ?>" disabled class="form-control">

</div>
</div></div>

<br><br>
                      <div class="col-md-4">
                    <div class="form-group">
<label for="">Email :</label>

                            <input type="text" value="<?php echo $info[0]['emp_email']; ?>" disabled class="form-control">
                               
                               
                        </div></div></div><br>
<br><br>
                                              
<div class="row">
                     <div class="col-md-6">
                    <div class="form-group">
<label for="">Location Name:</label><br>

<?php
                    $options = $dao->createOptions('area_name','area_id',"area");
                    echo $form->dropDownList('area_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('area_id'); ?>

</div></div>
  <div class="col-md-6">
                    <div class="form-group">
<label for="">Home service Name:</label><br>

<?php
                    $options = $dao->createOptions('categoryname','catid',"category");
                    echo $form->dropDownList('catid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('catid'); ?>

</div></div></div><br>
<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
<label for="">Description About Him:</label><br>

<input type="text" value="<?php echo $info[0]['emp_desc']; ?>" disabled class="form-control">

</div>
</div></div>
<br>
<div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
<label for="">Experience:</label><br>

<input type="text" value="<?php echo $info[0]['emp_exp']; ?>" disabled class="form-control">

</div>
</div>

	<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="submit" name="back" value="Back " class="btn btn-success btn-block" class="text-center p-5">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="submit" name="pay" value=" Print" class="btn btn-primary btn-block" class="text-center p-5" onclick="window.print()" id="printTable" onclick="printData();">
                </div>
            </div></div>
     
</form>


</body>

</html>
<?php include("adfooter.php"); ?>