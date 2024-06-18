
<?php include("cust_profile.php");	?>

<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Choose your Area </span>
			</span>
		</div>
	</div>

<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();

?>


	
	
<?php    
if(isset($_SESSION['cust_email']))
{ 
   $name=$_SESSION['cust_email'];
?>

<div class="container">

 <h7 class="title-w3-agileits title-black-wthree"><?php echo $name;?></h7>

<?php } ?>
				 <div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Choose Your Area </h4><br>
						<div class="priceing-table-main">

            <?php
			
			 $q="select * from area";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["area_img"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						
						<img style="width:200px" class="img-responsive" src=<?php echo BASE_URL."uploads/".$info[$i]["area_img"]; ?> alt=" "  /><br>
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["area_name"]?></h4> <br>
                         <?php   $_SESSION['did']= $info[$i]["area_id"] ?>
						</div>
						<div class="price-gd-bottom">
							  
							<div class="price-selet">
                            
			<a href="displayservices.php?id=<?= $info[$i]["area_id"]?>" > <h4 class="btn btn-success btn-block" class="text-center p-5"> Choose Your Area!</a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div></div></div>
		</div>
	</div>
	
		<?php include("footer.php");	?>
		