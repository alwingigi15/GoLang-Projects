
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php include("adhead.php");  ?>
<br><br>
<br><br>
<div class="col-sm-6 mt-5  mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Customer ID: </label>
      <input type="text" class="form-control ml-3" id="cust_id" name="cust_id" onkeypress="isInputNumber(event)" required="">
    </div>
    <button type="submit" class="btn btn-success">Search</button>
	   <form class="d-print-none d-inline mr-3"><button class="btn btn-success" type="submit"  name="back" ><a href="dash.php">Back</a></button>
  </form>
  <?php
  if(isset($_REQUEST['cust_id'])){
    $sql = "SELECT * FROM customer WHERE cust_id = {$_REQUEST['cust_id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row['cust_id']) == $_REQUEST['cust_id']){ ?>
  <h3 class="text-center mt-7">Customer Details</h3>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Customer ID</td>
        <td>
          <?php if(isset($row['cust_id'])) {echo $row['cust_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Customer First name</td>
        <td>
          <?php if(isset($row['cust_firstname'])) {echo $row['cust_firstname']; } ?>
        </td>
      </tr>
      <tr>
        <td>Customer Last Name</td>
        <td>
          <?php if(isset($row['cust_lastname'])) {echo $row['cust_lastname']; } ?>
        </td>
      </tr>
      <tr>
        <td>Email Id:</td>
        <td>
          <?php if(isset($row['cust_email'])) {echo $row['cust_email']; } ?>
        </td>
      </tr>
      <tr>
        <td>Customer House Name:</td>
        <td>
          <?php if(isset($row['cust_address'])) {echo $row['cust_address']; } ?>
        </td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td>
          <?php if(isset($row['mobileno'])) {echo $row['mobileno']; } ?>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="text-center">
    <form class="d-print-none d-inline mr-3"><button class="btn btn-success" type="submit"  name="back" ><a href="viewcustomers.php">Back</a></button><input class="btn btn-primary" type="submit" value="Print" onclick="window.print()"></form>
    
  </div>
  <?php } else {
      echo '<div class="alert alert-dark mt-4" role="alert">
      NO REORD FOUND </div>';
    }
 }
 ?>

</div>
<!-- Only Number for input fields -->
<?php 
 include("adfooter.php");  ?>
