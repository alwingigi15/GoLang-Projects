<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('customer_profile.php'); ?>
<div class="breadcrumbs-w3l">
    <div class="container">
      <span class="breadcrumbs">
        <a href="index.php">Home</a> |
        <span>My FeedBacks</span>
      </span>
    </div>
  </div>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
     
  
  
   
        <form  action="" method="post" class="p-5  form-inline">

              
              <div class="row form-group">
                <div class="col-lg-12" style="margin-left:160px">
				 <?php
         if(isset($_POST['type']))
         {
          if(strcmp($_POST['type'],"1") == 0)
          {
            header("Location: review.php");

          }
           elseif(strcmp($_POST['type'],"2") == 0)
          {
            header("Location: mycom.php");
            
          }
          
         }
         ?>
             <h2 class="text-center p-5"><b>FeedBacks</b></h2>
                <select class="form-control " name="type" id="type" onchange="this.form.submit()">
                <option value="0">----Select----</a>                  </option>
				<option value="1">My Review </a>                  </option>
				<option value="2">My Complaints </a>                  </option>
        
	</select>
               
               </div>
             

              

              
</div>
  
            </form>
    </div>
    </div>

    
    
    


    


    
   <?php include"footer.php";?>
  
  

  </body>
</html>