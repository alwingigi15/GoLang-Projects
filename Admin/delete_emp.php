<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php
$emp_id = $_GET['id'];
$sql = "delete from employee where emp_id=".$emp_id;

$conn->query($sql);

 
echo "<script> confirm('Employee Details Deleted'); </script>";
    echo "<script> location.replace('view_approved_employees.php'); </script>";


?>