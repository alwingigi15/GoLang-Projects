

<?php include("cust_profile.php"); ?>

<?php require('../config/autoload.php');


$dao=new DataAccess();
session_start();
  //$_SESSION['book_date']=$info['book_date'];
        //    $_SESSION['todate']=$info['todate'];
           
if($_SESSION['cust_email']){
	$cust_email = $_SESSION['cust_email'];
}
else
{
echo "<script> location.href='cust_login.php'</script>";
}
?>
<?php /*?><?php


    $q="select * from branch";

$info=$dao->query($q);

print_r($info);

 echo "<br/>";

$arrlength = count($info);
echo $arrlength;
 echo "<br/>";


$i=0;

while($i<count($info))
{
echo $info[$i]["branch_id"];
echo"   ";
echo $info[$i]["branch_name"];

echo "<br/>";
$i++;
}

foreach($info as $key=>$value)
{
    foreach($value as $key1=>$in)
    {
        echo $key1." --> ".$in;
    }
    echo "<br/>";
}

<a href="<?= BASE_URL ?>student/course.php?id=<?= $val['c_id'] ?>" class="button_outline">Details</a>

?>

<?php */?>

	<div class="jumbotron">
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
   
    
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>
<?php } 

?>

	 
				<h2 class="text-center p-5"><hr><U>Our Popular Services </U></h2><hr>
						<div class="priceing-table-main">
            <?php
			
			 $q="select * from category";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["job_image"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300" src=<?php echo BASE_URL."uploads/".$info[$i]["job_image"]; ?> alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["job_title"]?></h4> 
                               <h3><?php echo $info[$i]["job_desc"]?></h4> 
                         <?php   $_SESSION['job_id']= $info[$i]["job_id"] ?>
						</div>
						<div class="price-gd-bottom">
							  
							<div class="price-selet">
							
                            
			<a href="bookaser.php?id=<?= $info[$i]["cat_id"]?>" >VIEW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	</div>
		
		<?php include("footer.php"); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>