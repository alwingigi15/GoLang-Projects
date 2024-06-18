<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
include("employee_pro.php");
$id = $_GET['id2'];
$sql = "update booking set b_status='reject' where book_id=".$id;
echo $sql;
$conn->query($sql);

//header('location:view_booking.php');
echo "<script>alert('Request Rejected');</script>";
echo "<script> location.replace('view_booking.php');</script>";
?>