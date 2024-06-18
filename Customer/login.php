<!DOCTYPE html>
<html lang="en">
<head>
	
<!--===============================================================================================-->
</head>
<body>
<?php $conn = new mysqli("localhost","root", "", "project"); ?>
<?php require('../config/autoload.php'); 
include("header.php");?>
<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.php">Home</a> |
				<span>Login </span>
			</span>
		</div>
	</div>
	<div class="jumbotron">
		<div class="container">
		<center>
		

			
			<div id="news" class="w3ls-section">
		<div class="container">
			<h4 class="main-title" class="text-center p-5"> Account Login </h4><br>

			<form action="" method="POST">
<center>
			<div class="row">
                <div class="col-lg-10 col-md-12 m-auto">
                    <div class="testimonial-content">
                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                        <img src="find_user.png" class="user-image img-responsive"><h4 class="text-center p-5">Are You A Customer ? </h4><a href="cust_login.php">Login Here </a>
                        <br></div>
                       
						
						<div class="single-testimonial">
                        <img src="find_user.png" class="user-image img-responsive"><h4 class="text-center p-5">Are You A employee ? </h4><a href="employee_login.php">Login Here </a>
                        <br></div>
                       
                        <br></div></div></div></div></center></form></div></div></center></div></div></body></html>
                        <?php
                        include("footer.php");?>