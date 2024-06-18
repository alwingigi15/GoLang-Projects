<?php require('../config/autoload.php'); 
include("oghead.php");
include("dbcon.php");
	
$id=$_GET['id'];
$sql= "update employee set status='Approved' where emp_id=".$id;
$conn->query($sql);
header('location:employee_approve.php');

?>
