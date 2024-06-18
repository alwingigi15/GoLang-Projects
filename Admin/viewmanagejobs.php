<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('adhead.php'); ?>

    <br><br> 
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sno</th>
						
                        <th>Home Service Name</th>
						
                        <th>Description</th>
						
						<th>Image </th>
						

						<th></th>
                     
                      
                    </tr>
<?php
$actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editjobs.php','params'=>array('id'=>'catid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>' Delete','link'=>'deletejobs.php','params'=>array('id'=>'catid'),'attributes'=>array('class'=>'btn btn-danger'))
    
    );

$config=array(
       'srno'=>true,
      'hiddenfields'=>array('catid'),
      'actions_td'=>false,
'images'=>array(
                        'field'=>'cat_image',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:200px;'))
  );

   
    $fields=array('catid','categoryname','cat_desc','cat_image');

    $users=$dao->selectAsTable($fields,'category as c',1,NULL,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

