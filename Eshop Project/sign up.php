<?php
include("./connection.php");
include("./include/Allheader.php");

if(isset($_POST['sub'])){
	$ufname = mysqli_real_escape_string($connection,$_POST['ufname']);
	$ulname = mysqli_real_escape_string($connection,$_POST['ulname']);
	$uemail = mysqli_real_escape_string($connection,$_POST['uemail']);
	$umobile = mysqli_real_escape_string($connection,$_POST['umobile']);
	$ucountry = mysqli_real_escape_string($connection,$_POST['ucountry']);
	$ustate = mysqli_real_escape_string($connection,$_POST['ustate']);
	$ucity = mysqli_real_escape_string($connection,$_POST['ucity']);
	$pstlcode = mysqli_real_escape_string($connection,$_POST['pstlcode']);
	$uaddress = mysqli_real_escape_string($connection,$_POST['uaddress']);
	$praddress = mysqli_real_escape_string($connection,$_POST['praddress']);
	$upass = mysqli_real_escape_string($connection,$_POST['upass']);
	$cfmpass = mysqli_real_escape_string($connection,$_POST['cfmpass']);

	$sql = "INSERT INTO `signup` (`ufname`,`ulname`,`uemail`,`umobile`,`ucountry`,`ustate`,`ucity`,`pstlcode`,`uaddress`,`praddress`,`upass`,`cfmpass`)VALUES('$ufname','$ulname','$uemail','$umobile','$ucountry','$ustate','$ucity','$pstlcode','$uaddress','$praddress','$upass','$cfmpass')";
	$run = mysqli_query($connection,$sql);
	if($run){
		echo "RUN";
	}else{
		echo "NOT RUN";
	}
}

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
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Write us a message</h3>
								</div>
								<form class="form" id="data">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>First Name<span>*</span></label>
												<input name="ufname" type="text" placeholder="First name" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Last Name<span>*</span></label>
												<input name="ulname" type="text" placeholder="Last name" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="uemail" type="email" placeholder="Enter your Email" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input name="umobile" type="number" placeholder="Enter your number" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Country Name<span>*</span></label>
												<input name="ucountry" type="text" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>State<span>*</span></label>
												<input name="ustate" type="text" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>City<span>*</span></label>
												<input name="ucity" type="text" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Postal Code<span>*</span></label>
												<input name="pstlcode" type="number" placeholder="" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Current Address<span>*</span></label>
												<textarea name="uaddress" cols="10" rows="30" required></textarea>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
										<div class="form-group">
												<label>Permanent Address<span>*</span></label>
												<textarea name="praddress" cols="10" rows="30" required></textarea>
											</div>		
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="upass" type="password" placeholder="Enter password" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Confirm Password<span>*</span></label>
												<input name="cfmpass" type="password" placeholder="confirm password" required>
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" name="sub" id="sub" class="btn btn3">Sign in</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
		integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function(){
		$("#sub").on("click",(e)=>{
			e.preventDefault();
		var formData = new FormData(data);
		$.ajax({
			url:"./Ajax/ajaxsignup.php",
			method:"POST",
			contentType:false,
			processData:false,
			data:formData,
			success:function(res){
				// alert(res);
			if(res==1){
				const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							})

							Toast.fire({
								icon: 'success',
								title: 'Your data has been saved!'
							})
							$("#data").trigger("reset");
							window.location="./login.php";
			}else{
				const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							})

							Toast.fire({
								icon: 'warning',
								title: 'You data has not been saved!'
							})
			}
			}
		});
		});
	});
</script>