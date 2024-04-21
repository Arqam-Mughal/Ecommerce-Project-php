<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
include("./include/header.php");
include("./include/sidebar.php");

$cid = mysqli_real_escape_string($connection,$_GET['pid']);
$sql = "SELECT * FROM `project` where `pid`='$cid'";
$run = mysqli_query($connection,$sql);
$fet = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Update Categary-Page</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
 

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <form id="data">
                    <div class="card-header col-12">
                      <h4>Update Categary</h4>
                    <a href="./Viewcategary.php" target="_blank" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                    <label>Categary Name</label>
                    <input class="form-control mb-3" value="<?php echo $fet['pname']; ?>" type="text" placeholder="Enter Name" name="pname">
                    <input class="form-control mb-3" value="<?php echo $fet['pid']; ?>" type="hidden" placeholder="Enter Name" name="sid">
                
                    <label>Message</label>
                    <textarea class="form-control mb-3" name="pmessage"><?php echo $fet['pmessage']; ?></textarea>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" value="Update" id="update" name="sub" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
       
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
		integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>

		$(document).ready(function () {
			
			$("#update").on("click", function (e) {
				e.preventDefault();
				var formData = new FormData(data);
				$.ajax({
					url: "./Ajax/updatecategary.php",
					method: "POST",
					contentType: false,
					processData: false,
					data: formData,
					success: function (res) {
           alert(res);
						// if (res == 1) {
                        
						// 	const Toast = Swal.mixin({
						// 		toast: true,
						// 		position: 'top-end',
						// 		showConfirmButton: false,
						// 		timer: 3000,
						// 		timerProgressBar: true,
						// 		didOpen: (toast) => {
						// 			toast.addEventListener('mouseenter', Swal.stopTimer)
						// 			toast.addEventListener('mouseleave', Swal.resumeTimer)
						// 		}
						// 	})

						// 	Toast.fire({
						// 		icon: 'success',
						// 		title: 'Data Has Been Updated'
						// 	})

						// 	$("#data").trigger("reset");
            //    window.location="./Viewcategary.php";
						// } else if (res == 2) {
            //     const Toast = Swal.mixin({
						// 		toast: true,
						// 		position: 'top-end',
						// 		showConfirmButton: false,
						// 		timer: 3000,
						// 		timerProgressBar: true,
						// 		didOpen: (toast) => {
						// 			toast.addEventListener('mouseenter', Swal.stopTimer)
						// 			toast.addEventListener('mouseleave', Swal.resumeTimer)
						// 		}
						// 	})

						// 	Toast.fire({
						// 		icon: 'warning',
						// 		title: 'Data has not been updated'
						// 	})
						


						// }
					}

				});

			});
		});

	</script>


</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>

