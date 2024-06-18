<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
$area_id = $_GET['id'];
$sql = "delete from area where area_id=".$area_id;

$conn->query($sql);

 
echo "<script> confirm('Location Deleted'); </script>";
    echo "<script> location.replace('viewmanagearea.php'); </script>";


?>