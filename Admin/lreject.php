<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
include("adhead.php");
$id = $_GET['id'];
$id = $_GET['id1'];
$sql =" UPDATE employee SET emp_avail='available' WHERE emp_id=".$id;
$sql1 = "update leaves set leave_status='reject' where leave_id=".$id1;
if ($conn->query($sql) === TRUE) {
    echo "<script> alert(' leave request rejected');</script> ";
  echo"<script> location.replace('viewleavenew.php'); </script>";
  
} elseif($conn->query($sql1) === TRUE) {
	 echo "<script> alert(' leave request rejected');</script> ";
  echo"<script> location.replace('viewleavenew.php'); </script>";
    
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>