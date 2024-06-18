<?php require('../config/autoload.php'); ?>

<?php
//session_start();

						
if($_SESSION['cust_email'])
{
	$name = $_SESSION['cust_email'];
}
else
{
echo "<script> location.href='cust_login.php'</script>";
}

?>
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("cust_profile.php"); ?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Choose Your employee </span>
			</span>
		</div>
	</div>
<?php


$dao=new DataAccess();



?>
				 <h3 class="title-w3-agileits title-black-wthree"></h3>
						<div class="priceing-table-main">
           <?php
		
	
           $bid=$_GET['id2']; 
			$did=$_SESSION['did'];
		
							$from_date=$_SESSION['from_date'];
							
	                   $to_date=$_SESSION['to_date'];
			$sql1="select * from employee where catid=".$bid." and area_id=".$did." and status='approved' and emp_avail='available' and emp_id not in (select b.emp_id from booking as b where (('$from_date' between from_date and to_date)or('$from_date' <= from_date))and(('$to_date' between from_date and to_date)or('$to_date' >=to_date))and book_status='booked')";

 $result = $conn->query($sql1);
 if ($result->num_rows <= 0)
 {
	 
	echo "<script> alert('Sorry No employee are available on your time, Select Another Date ');</script> ";
	 
echo"<script >location.href = 'date1.php'</script>";
}

			
		
			              
			$q="select * from employee where catid=".$bid." and area_id=".$did." and status='approved'and emp_avail='available' and emp_id not in (select b.emp_id from booking as b where (('$from_date' between from_date and to_date)or('$from_date' <= from_date))and(('$to_date' between from_date and to_date)or('$to_date' >=to_date))and book_status='booked')";

							
$info=$dao->query($q);
			
$d=count($info);

echo "<script> alert('$d employees Available');</script>";

if (count($info)==1)

		$i=0;          
			
 ?>
							
							
							
							








		<div class="container">
		<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Choose your employee! </h4><br>
			
						<div class="priceing-table-main">
            
          </div>
        
        <div class="row">
			
			
			
			
			
			<?php
			

			$i=0;          
			 while($i<count($info))
			
{

			?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<table>
						<tr><img style="width:200px; height:200px;" src=<?php echo BASE_URL."uploads/".$info[$i]["emp_img"]; ?> alt=" " class="img-responsive" /></tr>
							<br>
                             <tr> <h4><b>Name: </b><?php echo $info[$i]["emp_firstname"] ?></h4></tr><br>
                               <tr><h4><b>Age: </b><?php echo $info[$i]["Age"] ?></h4></tr><br>
                              <tr> <h4><b>Description: </b><?php echo $info[$i]["emp_desc"] ?></h4></tr><br><br>
                                <tr><h4><b>Experience: </b><?php echo $info[$i]["emp_exp"]. " years"; ?></h4></tr><br>
                           
                                  
                             </table>
						</div>
                        <!--<h4>Qualification</h4>
                              <h4> <?php //echo $info[$i]["dqual"]?></h4>

                              <h4> <?php //echo $info[$i]["dfees"]?></h4>-->
						<div class="price-gd-bottom">
							   
							<div class="price-selet">
                            
		<h5><b><i>Now it's Time For Booking!	</i></b><a href="booking.php?id4=<?= $info[$i]["emp_id"]?>" ><h3 class="btn btn-success btn-block" class="text-center p-5"><b>BOOK NOW</a></b></h3>

							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} 
		?>

				<div class="clearfix"> </div>
			</div>
		</div></div>
		</div>
	</div>
	</div>
	
		<?php include("footer.php");	?>
	
	