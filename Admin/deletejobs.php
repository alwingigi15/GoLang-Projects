	
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
$catid = $_GET['id'];
$sql = "delete from category where catid=".$catid;

$conn->query($sql);

echo "<script> confirm('Service Deleted'); </script>";
    echo "<script> location.replace('viewmanagejobs.php'); </script>";



?>