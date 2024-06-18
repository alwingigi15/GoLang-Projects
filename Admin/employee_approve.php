<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('adhead.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>employee id</th>
						
                        <th>employee firstname</th>
						
					
						
                        <th>address</th>
						
						 <th>location id</th>
						
                        <th>gender</th>
						
						<th>DOB</th>
						
						
						
						<th>email_id</th>
						
						<th>employee image</th>
						
						
						<th>Job name</th>
						
						
						<th>experience</th>
						
						<th>status</th>
					
						
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Approve','link'=>'approved.php','params'=>array('id'=>'emp_id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Reject','link'=>'deleteapprove.php','params'=>array('id'=>'emp_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
       'srno'=>true,
        'hiddenfields'=>array('emp_id'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'emp_img',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
		
        
        
    );
					$condition="status='A'";

   
   $join=array(
       'category as c'=>array('c.catid=e.catid','join'),
    ); 
	$fields=array( 'emp_id','emp_firstname','emp_address','area_id','gender','dob','emp_email','emp_img','categoryname','emp_exp');

    $users=$dao->selectAsTable($fields,'employee as e',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
