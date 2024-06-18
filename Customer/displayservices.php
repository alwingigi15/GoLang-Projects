

<?php include("cust_profile.php");	?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Choose Your Service</span>
			</span>
		</div>
	</div>


<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
//session_start();



?>
<?php ?>

	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php    
if(isset($_SESSION['cust_email']))
{ 
   $name=$_SESSION['cust_email'];

?>

 <h7 class="title-w3-agileits title-black-wthree"><?php echo $name;?></h7>

<?php } ?>

<div class="container">
				 <div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Choose Your Service!</h4><br>
						<div class="priceing-table-main">
            <?php
            
        
		$aid=$_GET['id']; 
		
			$_SESSION['did']=$aid;
			
			 $q="select * from category";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["cat_image"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:200px" src=<?php echo BASE_URL."uploads/".$info[$i]["cat_image"]; ?> alt=" "class="img-responsive" /><br>
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["categoryname"]?></h4> <br>
                              <h5><?php echo $info[$i]["cat_desc"]?></h5><br>
                             
						</div>
						<div class="price-gd-bottom">
							 
							<div class="price-selet">
                            
			<a href="bookaser.php?id2=<?= $info[$i]["catid"]?>" ><h4 class="btn btn-success btn-block" class="text-center p-5"> Choose Your Services!</a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div></div></div>
	</div>
	
		<?php include("footer.php");	?>
		
	