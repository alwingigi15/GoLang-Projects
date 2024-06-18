	
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
$review_id = $_GET['id'];
$sql = "delete from review where review_id=".$review_id;

$conn->query($sql);

 //header('location:review.php');
echo "<script>alert('Deleted');</script>";
echo "<script> location.replace('review.php');</script>";



?>