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
                        
                        <th>Sno</th>
                        <th>Location Name</th>
                       <th>Location image</th>
                       <th></th>
                     
                      
                    </tr>
<?php
$actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editarea.php','params'=>array('id'=>'area_id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>' Delete','link'=>'deletearea.php','params'=>array('id'=>'area_id'),'attributes'=>array('class'=>'btn btn-danger'))
    
    );
$config=array(
       'srno'=>true,
      'hiddenfields'=>array('area_id'),
      'actions_td'=>false,
      'images'=>array(
                        'field'=>'area_img',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:200px;'))
  );
$join=array(
       
    );
   
    $fields=array('area_id','area_name','area_img');

    $users=$dao->selectAsTable($fields,'area as a',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
  
    
