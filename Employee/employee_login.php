<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('../config/autoload.php');
include("./header.php");

$elements = array("emp_email" => "", "emp_password" => "");
$form = new FormAssist($elements, $_POST);
$rules = array(
    'emp_email' => array('required' => true),
    'emp_password' => array('required' => true),
);
$validator = new FormValidator($rules);

if (isset($_POST['login'])) {
    if ($validator->validate($_POST)) {
        $data = array('emp_email' => $_POST['emp_email'], 'emp_password' => $_POST['emp_password']);
        if ($info = $dao->login($conn, $data, 'employee')) {
            echo "<script> alert('Welcome {$info['emp_email']} to the HOME SERVICE Family...');</script> ";
            echo "<script> location.replace('employee_profile.php'); </script>";
        } else {
            $msg = "Invalid username or password";
            echo "<script> alert('Invalid username or password');</script> ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--===============================================================================================-->
</head>

<body>
    <div class="jumbotron">
        <div class="container">
            <!-- ... rest of your HTML ... -->
        </div>
    </div>

    <div class="footer-main-w3_agile">
        <div class="footer-dot">
            <!-- ... rest of your HTML ... -->
        </div>
    </div>

    <div class="cpy-footer">
        <!-- ... rest of your HTML ... -->
    </div>

    <!-- JavaScript and jQuery scripts -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/JiSlider.js"></script>
    <script>
        $(window).load(function () {
            $('#JiSlider').JiSlider({
                color: '#fff',
                start: 1,
                reverse: false
            }).addClass('ff')
        })
    </script>
    <script src="js/main.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
