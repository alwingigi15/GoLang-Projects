

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
<?php include("Rhead.php");	?>
<?php require('../config/autoload.php'); ?>
<?php $conn = new mysqli("localhost","root", "", "project"); ?>


<?php
$dao=new DataAccess();
   $date1=$_SESSION['from_date'] ;
$date2=$_SESSION['tod_ate'] ;
   if(isset($_POST["back"]))
{
    
     echo "<script>location.replace('Rhead.php');</script>";
}
     ?>
             
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            <H1><center> Booking Reports</center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
						
                        <th> Customer Name</th>
						
                        <th>Requester Name</th>
						
                        <th> Problem Description </th>
                         
                          <th>Employee Name</th>
						
                        <th>From Date</th>
						
                         <th>To Date</th>
						
                          <th>Status </th>
                        
                     
                       
                       
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('book_id')
        
        
    );

   $condition="from_date>='".$date1."' and to_date<='".$date2."'";
   
   $join=array(
    'customer as a'=>array('a.cust_id=b.cust_id','join'),
       'employee as e'=>array('e.emp_id=b.emp_id','join'),
    );  
    $fields=array('book_id','a.cust_firstname','requester_name','prblm_desc','e.emp_firstname','from_date','to_date','b_status');

    $users=$dao->selectAsTable($fields,'booking as b',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>

            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">
<center>
<div class="row"><br>


                    
                    <input type="submit" name="pay" value="print" onclick="window.print()" id="printTable" onClick="printData();" class="btn btn-primary btn-block" class="text-center p-5">
            <input class="btn btn-success" type="submit"  name="back" value="Back"></div></center>
</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php //} ?>
<?php include("adfooter.php"); ?>