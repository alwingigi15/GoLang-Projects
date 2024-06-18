
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('adhead.php'); ?>
  

    <br><br><br>
 
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
			<h2 class="text-center p-5"><b>OUR EMPLOYEES</b></h2><br>
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Slno</th>
                        <th>Employee Name</th>
                       
                        <th>employee age</th>
                        <th>Employee House Address</th>
                     
                      
                    </tr>
<?php

$actions=array(
    'View'=>array('label'=>'View More...','link'=>'view_approved_employees1.php','params'=>array('id'=>'emp_id'),'attributes'=>array('class'=>'btn btn-success')),
	
'delete'=>array('label'=>'Delete','link'=>'delete_emp.php','params'=>array('id'=>'emp_id'),'attributes'=>array('class'=>'btn btn-danger')));
$config=array(
       'srno'=>true,
      'hiddenfields'=>array('emp_id'),
      'actions_td'=>false,
  );
$condition="status='approved' and pay_status='pending'";
   
   $fields=array('emp_id','emp_firstname','age','emp_address');

    $users=$dao->selectAsTable($fields,'employee as e',1,$condition,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
           
                </table>
              
            </div>    

            
            <a href="dash.php" class="btn btn-success">Back</a>
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    <?php include("adfooter.php"); ?>
    
