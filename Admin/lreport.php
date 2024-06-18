
<script>
  function printData()
  {
    var divToPrint=document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();

  }
</script>
<?php include("adhead.php");	?>
<?php require('../config/autoload.php'); ?>
<?php $conn = new mysqli("localhost","root", "", "project"); ?>


<?php
$dao=new DataAccess();
   $date1=$_SESSION['leave_from'] ;
$date2=$_SESSION['leave_to'] ;
   if(isset($_POST["back"]))
{
     echo "<script>location.replace('report.php');</script>";
}

     
       
        ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            <H1><center> Leave Reports  </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Employee name</th>
                         
                        <th>From Date</th>
                         <th>To Date</th>
                         <th>Reason </th>
                          <th>Status </th>
                        
                     
                       
                       
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('leave_id')
        
        
    );

   $condition="leave_from>='".$date1."' and leave_to<='".$date2."'";
   
   $join=array(
   
       'employee as e'=>array('e.emp_id=l.emp_id','join'),
    );  
    $fields=array('leave_id','e.emp_firstname','leave_from','leave_to','reason','leave_status');

    $users=$dao->selectAsTable($fields,'leaves as l',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="back" >Back</button>
<input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onclick="printData();" class="btn btn-primary">


</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php //} ?>

<?php include("adfooter.php"); ?>