<?php
 session_start();
 session_destroy();
 echo "<script> location.href='cust_login.php'; </script>";
?>