<?php 
require('../config/autoload.php'); 
$conn = new mysqli("localhost","root", "", "project"); ?><?php 
include("Rhead.php");

$date=date("Y-m-d");
$time=date('h:i a');

?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
       <div class="row pad-botm">
            <div class="col-md-12">
                
                
                            </div>
<br><hr>
 <!--/.ROW-->
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-16">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                         <center> CUSTOMER BOOKING DATES REPORT</center>
                        </div>
                        <?php
            $query=mysqli_query($conn,"select * from booking");
            while($f=mysqli_fetch_array($query))
                {
                 $efdate=$f['from_date'];
                 $etdate=$f['to_date'];
               }
			           if ($date < $etdate)
			           { $to_da=$date;}
			           else 
			           { $to_da=$etdate;}
			   ?>
                         <div class="panel-body">
                            <div class="form-group"><form action="" method="POST">
                    From:<input type="date" name="from_date" ; ?>
                To:<input type="date" name="to_date" ; ?>
                <input type="submit" class="btn btn-info" name="submit1" value="Sort">
             
            


</form>

    <table class="table table-hover personal-task">
                 <tbody>
                   <?php


            
            
            if(isset($_POST['submit1']))
            {

              $from_date=$_POST['from_date'];
              $to_date=$_POST['to_date'];
			  
              if($from_date>$to_date)
                  {
                    echo"<script>window.alert('Please enter a valied from and to date')</script>";  
                     die();
                  }

                  else
                  {
                      
					 
					 // $f1=mysqli_query($conn,"SELECT * FROM booking where from_date between '$from_date' and '$to_date'");}
              $f1=mysqli_query($conn,"SELECT * FROM booking b,employee  e, customer c where b.emp_id=e.emp_id and b.cust_id=c.cust_id  and book_status='booked' and  from_date between '$from_date' and '$to_date'");}
              
              ?>

                                        <tr>
                                         
                                            <th><i class="icon_calendar"></i>Customer Name</th>  
											
                                            <th><i class="icon_calendar"></i> Problem description</th>
											
                                            <th><i class="icon_calendar"></i>Requester name</th>
											
                                            <th><i class="icon_calendar"></i>Employee Name</th>
											
											<th><i class="icon_calendar"></i>From date</th>
											
											<th><i class="icon_calendar"></i>To date</th>
											
											<th><i class="icon_calendar"></i>status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											 while($f=mysqli_fetch_array($f1))
                                             {
										?>
                                      
											<tr>
												<td><?php echo $f['cust_firstname'];?></td>
												<td><?php echo $f ['prblm_desc'];?></td>
												<td><?php echo $f ['requester_name'];?></td>
												<td><?php echo $f ['emp_firstname'];?></td>	
												<td><?php echo $f ['from_date'];?></td>	
												<td><?php echo $f ['to_date'];?></td>	
												<td><?php echo $f ['b_status'];?></td>
											</tr>
										 <?php } ?>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
              
              


</body>

</html>
     
                    
                    
                    
                    
                    
                    
                    