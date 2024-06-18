<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
include("employee_pro.php");
$id = $_GET['id1'];
$sql = "update booking set b_status='complete' where book_id=".$id;
//echo $sql;
$conn->query($sql);

//header('location:workstatus.php');
echo "<script>alert('Work Completed');</script>";
echo "<script> location.replace('workstatus.php');</script>";
?>