
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php require('../config/autoload.php'); ?>
<?php include("header.php"); ?>

	<div class="plans-section" id="rooms">
				 <div class="container">
				 <div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Dashboard</span>
			</span>
		</div>
	</div>

<div class="jumbotron">
<div class="container">
<?php
$sql = "SELECT count(cust_id) FROM customer";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $submitrequest = $row[0];
$sql = "SELECT count(area_id) FROM area";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $assign = $row[0];
 $sql = "SELECT count(emp_id) FROM employee";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $assignwork = $row[0];

 $sql = "SELECT * FROM booking";
 $result = $conn->query($sql);
 $totaltech = $result->num_rows;

?>
<div class="w3ls-section  stats">
		<div class="container">
			<h5>On time,On budget, with in Scope and with Quality.</h5>
			<div class="stats-aboutinfo services-main">
				<div class="col-sm-3 col-xs-3 agileits_w3layouts-stats-grids text-center">
					<div class="stats-icon">
						<span class="fa fa-users" aria-hidden="true"></span>
					</div>
					<div class="stats-right">
						<h6>Total Customers </h6>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='11073' data-delay='.5' data-increment="10">

					
					<h4 class="card-title">
            <?php echo $submitrequest; ?>
          </h4></div></div>
				</div>
				<div class="col-sm-3 col-xs-3 agileits_w3layouts-stats-grids text-center">
					<div class="stats-icon">
						<span class="fa fa-shield" aria-hidden="true"></span>
					</div>
					<div class="stats-right">
						<h6>Our Areas </h6>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='780' data-delay='.5' data-increment="1">
<h4 class="card-title">
            <?php echo $assign; ?>
          </h4>
					</div>
</div>
				</div>
				<div class="col-sm-3 col-xs-3 agileits_w3layouts-stats-grids text-center">
					<div class="stats-icon">
						<span class="fa fa-external-link" aria-hidden="true"></span>
					</div>
					<div class="stats-right">
						<h6>Total No of Employees </h6>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='630' data-delay='.5' data-increment="1">
<h4 class="card-title">
            <?php echo $assignwork; ?>
          </h4></div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-3 agileits_w3layouts-stats-grids text-center">
					<div class="stats-icon">
						<span class="fa fa-book" aria-hidden="true"></span>
					</div>
					<div class="stats-right">
						<h6>Total Requests we Get...</h6>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='623' data-delay='.5' data-increment="1">
<h4 class="card-title">
            <?php echo $totaltech; ?>
          </h4></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div></div>






<?php
$dao=new DataAccess();
//session_start();



?>
	<div class="plans-section" id="rooms">
				 <div class="container">
				 <div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Services </span>
			</span>
		</div>
	</div>

<div class="jumbotron">
<div class="container">
<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title">Our Services</h4>
			<br>
            <?php
            
          
			 $q="select * from category";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["cat_image"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300px" class="img-responsive" src=<?php echo BASE_URL."uploads/".$info[$i]["cat_image"]; ?> alt=" "  /><br>
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><b><?php echo $info[$i]["categoryname"]?></b></h4> <br>
                              <h5><?php echo $info[$i]["cat_desc"]?></h5><br>
                             
						</div>
						<div class="price-gd-bottom">
							 
							<div class="price-selet">
                            
			
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
</div></div>
	<br><br>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Areas </span>
			</span>
		</div>
	</div>
<div class="jumbotron">
<div class="container">



	
	
<?php    
if(isset($_SESSION['cust_email']))
{ 
   $name=$_SESSION['cust_email'];
?>


 

<?php } ?>
				
<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title">Our Areas </h4>
			<br>
            <?php
			
			 $q="select * from area";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ //$s=$info[$i]["dimg"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300px" src=<?php echo BASE_URL."uploads/".$info[$i]["area_img"]; ?> alt=" "class="img-responsive" /><br>
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><b><?php echo $info[$i]["area_name"]?></b></h4> <br>
                         <?php   $_SESSION['did']= $info[$i]["area_id"] ?>
						</div>
						<div class="price-gd-bottom">
							  
							<div class="price-selet">
           
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
	</div></div></div>







	<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Employees </span>
			</span>
		</div>
	</div>
<div class="jumbotron">
<div class="container">



	
	
<?php    
if(isset($_SESSION['cust_email']))
{ 
   $name=$_SESSION['cust_email'];
?>


 

<?php } ?>
				
<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title">Our Employess </h4>
			<br>
            <?php
			
			$q = "SELECT * FROM employee WHERE status = 'approved'";

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ //$s=$info[$i]["dimg"];
		?>		 <div class="col-md-3 price-grid">
		<div class="price-block agile">
			<div class="price-gd-top text-center"> <!-- Center-align the content -->
				<img style="width: 100%; max-height: 200px; object-fit: cover;" src="<?php echo BASE_URL."uploads/".$info[$i]["emp_img"]; ?>" alt="Employee Image" class="img-responsive" />
				<h4><b><?php echo $info[$i]["emp_firstname"]?></b></h4>
				<?php $_SESSION['did'] = $info[$i]["emp_id"]; ?>
			</div>
			<div class="price-gd-bottom">
				<div class="price-selet">
					<!-- Add any additional content related to selecting a price or action here -->
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
	</div></div></div>
	 
    </table>
        </form>
        

            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
           </div>

</div></div>



		
		<?php include("footer.php"); ?>