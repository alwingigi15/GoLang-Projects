<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

if(isset($_POST['sub']))
{
	echo "<script>alert('thank you for contacting! we are connecting you soon...'); </script>";

}
?>
<?php
include("header.php");
?>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.html">Home</a> |
				<span>Contact Us</span>
			</span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- contact -->
	<div class="w3ls-section banner-single">
		<div class="container">
			<h4 class="main-title">contact us</h4>
			<div class="about-inner-main">
				<div class="col-md-6 contact-left">
					<div class="agile-contact-top">
						<h4>address </h4>
						<p>1234k Avenue,Block-4,New York City.</p>
					</div>
					<div class="contact-bottom">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3060153584!2d-74.2598711799434!3d40.69714940555201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1510842846108"
						    style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-6 w3layouts-reg-form contact-form-row-agileinfo">
					<h4 class="form-con-txt">send us a mail</h4>
					<form action="#" method="post" class="banner_form contact-inner-form">
						<div class="contact-form-left contact-field1">
							<div class="sec-left">
								<label class="contact-form-text">Name</label>
								<input placeholder="your name " name="first name" type="text" required="">
							</div>
							<div class="sec-right">
								<label class="contact-form-text">Email</label>
								<input placeholder="xxx@xx.com " name="first name" type="email" required="">
							</div>
						</div>
						<div class="contact-form-right contact-field2">
							<input type="submit" name="sub" value="send message">
						</div>
						<div class="clearfix"></div>
						<div class="form-tx contact-field3">
							<label class="contact-form-text">Address</label>
							<textarea placeholder="your address" required=""></textarea>
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- contact -->
	<div class="w3ls-section app-head">
		<div class="container">
			<div class="col-md-4 col-sm-4 app-mobile">
				<img src="images/mobile.png" alt="" class="img-responsive" />
			</div>
			<div class="col-md-8 col-sm-8 app-main">
				<h6>home services at your
					<span>finger tips!</span>
				</h6>
				<div class="app-form">
					<p>get the SMS link to download free app </p>
					<form action="#" method="post" class="banner_form">
						<div class="sec-left">
							<input placeholder="Enter your mobile #" name="first name" type="text" required="">
						</div>
						<input type="submit" value="get the app">
						<div class="clearfix"></div>
					</form>
				</div>
				<ul class="app-links">
					<li>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
					</li>
					<li>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
					</li>
				</ul>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php
	include("footer.php");
	?>