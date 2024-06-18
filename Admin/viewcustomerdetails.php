<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('./header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>CUSTOMER_Id</th>
                        <th>CUSTOMER FIRSTNAME</th>
                        <th>CUSTOMER LASTNAME</th>
                        <th>GENDER</th>
                        <th>AGE</th>
                        <th>ADDRESS</th>
						<th>EMAIL_ID</th>
						<th>MOBILE NUMBER</th>
						<th>LOCATION</th>
						
						
                        <th>EDIT</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edit_customerdetails.php','params'=>array('id'=>'cust_id'),'attributes'=>array('class'=>'btn btn-success')),
    
    //'delete'=>array('label'=>'Delete','link'=>'editstudents.php','params'=>array('id'=>'sid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cust_id')
        
        
    );

   
   $join=array(
       
    );  $fields=array('cust_id','cust_firstname','cust_lastname','cust_gender','cust_age','cust_address','cust_email','mobileno','area_id');

    $users=$dao->selectAsTable($fields,'customer as c',1,NULL,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
