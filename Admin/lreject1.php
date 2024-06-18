<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
include("adhead.php");
$id = $_GET['id'];

$sql = "update leaves set leave_status='reject' where leave_id=".$id;
echo $sql;
$conn->query($sql);

//header('location:viewleaves.php');
echo "<script> alert('Leave Rejected'); </script>";
    echo "<script> location.replace('viewleavenew.php'); </script>";
?>