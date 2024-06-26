<?php
include("./connection.php");
session_start();

$uemail= @$_SESSION['uemail'];
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
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PICTURE</th>
								<th>PRODUCT NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center">REMOVE</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM `cart` WHERE `uemail` = '$uemail'";
							$run = mysqli_query($connection,$sql);
							$gtotal = 0;
							$abc = 0;
							while($fet=mysqli_fetch_assoc($run)){
								$abc++;
							?>
							<tr>
								
								<td><?php $pi=explode(",",$fet['ppic']); ?>
								<img src="<?php echo "../Project/img/".$pi[0]; ?>" alt="">
								</td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?php echo $fet['proname']; ?></a></p>
									<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td class="price" data-title="Price"><span><?php echo $fet['psale'] ?></span></td>								
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group input1">
									<input type="hidden" name="catid" class="cart_id" value="<?php echo $fet['productid']; ?>">
								<input type="hidden" name="price" class="pricee" value="<?php echo $fet['psale']; ?>">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[<?php echo $abc; ?>]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[<?php echo $abc; ?>]" class="input-number qnty" id="num1"  data-min="1" data-max="100" value="<?php echo $fet['quantity']; ?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[<?php echo $abc; ?>]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span><?php echo $fet['ptprice'] ?></span></td>
								<td class="action " data-title="Remove" ><i data-productid="<?php echo $fet['productid']; ?>" class="ti-trash remove-icon delete"></i></td>
							</tr>
							<?php
							$gtotal = $gtotal+$fet['ptprice'];
							}
							?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>RS. <?php echo $gtotal; ?> PKR</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li>
										<li class="last">You Pay<span>RS. <?php echo $gtotal; ?> PKR</span></li>
									</ul>
									<div class="button5">
										<a href="./checkout.php" class="btn">Checkout</a>
										<a href="./shop.php" class="btn">Continue shopping</a>
										<a href="#" class="btn empty">Remove All</a>
									</div>
									</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
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
	
	
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	
	
<?php

include("./include/footer.php");

?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.28/sweetalert2.all.js" integrity="sha512-cD1xrn0N1tV0ze8axCp+noWgxMFlWVg22HBXUfowicWhJsnAcSXNKnwI77Bkn3yLyqGvwZ/a8M2PtOjVp5vMaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.28/sweetalert2.all.js"></script>
<script>
	$(document).ready(function(){
		$(document).on("click",".delete", function(e){
			// e.preventDefault();
			var productid = $(this).data("productid");
			// alert(productid);
			var msg = this;
                // alert(msg);
                
								Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Remove All!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "./Ajax/cart.php",
                            method: "POST",
                            data: { del: productid },
                            success: function (response) {
                            //    alert(response);
                                if (response == 5) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )			
                                    $(msg).closest("tr").fadeOut();
									// location.reload();
                                } else if(res==6) {
                                    Swal.fire(
                                        'warning',
                                        'Your file has NOT been deleted.',
                                        'error'
                                    )
									// $(msg).closest("tr").fadeOut();
									// location.reload();
                                }
                            }
                        })
											}
                })

                    
                })

            })
            

		
		$(document).ready(function(){
			$(document).on("click",".empty",function(){
				Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Remove All!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "./Ajax/cart.php",
                            method: "POST",
                            data: { myempty: "myempty" },
                            success: function (res) {

                                if (res == 7) {

                                    Swal.fire(
                                        'Deleted!',
                                        'All items removed Successfully!',
                                        'success'
                                    )			
                                    setTimeout(()=>{
										location.reload(true);

									},1000);
									
                                } else if(res==8) {
                                    Swal.fire(
                                        'warning',
                                        'All items are not removed Successfully!.',
                                        'error'
                                    )
                                }
                            }
                        })

                    }
                })
			});
			$(".input1").on("change",function(){
				var data = $(this).closest(".input1");
				var cartid = data.find(".cart_id").val();
				var pricee = data.find(".pricee").val();
				var qnty = data.find(".qnty").val();
				// alert(cartid);
				// alert(pricee);
				// alert(qnty);
			$.ajax({
				url: "./Ajax/cart.php",
                            method: "POST",
                            data: { mycartid: cartid,
							                      myprice:pricee,
							                      cqty:qnty,
						                    	},
                            success: function (response) {
								// alert(response);
							if(response==9){
								location.reload(true);
							}
							}
			})
			})
		});
</script>