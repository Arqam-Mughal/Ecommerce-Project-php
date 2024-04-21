<?php
include("./connection.php");
session_start();

if(isset($_POST['sub'])){

	$uemail = mysqli_real_escape_string($connection,$_POST['uemail']);
	$pass = mysqli_real_escape_string($connection,$_POST['upass']);

	$sqla ="SELECT * FROM `signup` WHERE `uemail`='$uemail' && `upass`='$pass'";
	$run = mysqli_query($connection,$sqla);
	$fet=mysqli_fetch_assoc($run);
	if(mysqli_num_rows($run)==1){

			$_SESSION['uemail']=$uemail;
			header("location:./shop.php");
		}else{
			echo "<script>alert('Invalid Details')</script>";
		}
	}
include("./include/Allheader.php");


?>
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12 mt-5 pt-5 " >
							<div class="form-main hover" id="leave" onmouseenter="changeA()" onmouseleave="changeB()">
								<div class="title">
									<h4>That,s Required!</h4>
									<h3>Log In with Us</h3>
								</div>
								<form class="form" method="post"  >
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="uemail" type="email" placeholder="Enter your Email">
											</div>	
										</div>
                                        <div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Enter Password<span>*</span></label>
												<input name="upass" type="password" placeholder="Enter your Password">
											</div>	
										</div>
										<div class="col-12">
                                            <div class="row justify-content-around">
                                        <div class="form-group button">
												<button type="submit" name="sub" class="btn btn2  rounded pr-5 pl-5">Sign in</button>
											</div>
                                            <div class="form-group button">
											<a href="./sign up.php" type="button" class="btn btn1 px-5 rounded text-white">Sign Up</a>
											</div>
                                            </div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap"></div>
	</div>
	<!--/ End Map Section -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->

	<?php

include("./include/footer.php");

?>
<script>
	function changeA(){
	document.querySelector(".hover").style.backgroundColor="grey";
	document.querySelector(".hover").style.transition="all 0.5s ease-in";
	document.querySelector(".hover").style.color="white";
}

function changeB(){
	document.querySelector("#leave").style.backgroundColor="";
	document.querySelector(".hover").style.color="";

}
</script>