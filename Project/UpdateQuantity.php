<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

//<-------- if we want to update an image then use it otherwise not important.------->

$quaid = $_GET['quaid'];
$up = "SELECT * FROM `quantity` WHERE `quaid`='$quaid'";
$run = mysqli_query($connection,$up);
$fet = mysqli_fetch_assoc($run);

?>


<!-- Next ---------------------- -->
<?php
include("./include/header.php");
include("./include/sidebar.php");

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Update Quantity-Page</title>
  <!-- General CSS Files -->

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
                      <h4>Update Quantity</h4>
                    <!-- <a href="./ViewQuantity.php" class="btn btn-success">View</a> -->
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quaname" class="form-control" value="<?php echo $fet['quaname']; ?>">
                        <input type="hidden" name="quaid" value="<?php echo $fet['quaid']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Descryption</label>
                        <textarea name="quades" class="form-control"><?php echo $fet['quades'] ?></textarea>
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <input class="btn btn-primary" type="submit" id="update" name="sub" value="Update">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
       
      </div>
     <?php
     include "./include/footer.php";
     ?>
    </div>
  </div>
  <!-- General JS Scripts -->


  <script>
    $(document).ready(function () {
			
			$("#update").on("click", function (e) {
				e.preventDefault();
				var formData = new FormData(data);
        // alert(formData);
				$.ajax({
					url: "./Ajax/update quantity.php",
					method: "POST",
					contentType: false,
					processData: false,
					data: formData,
					success: function (res) {
          //  alert(res);
						if (res == 1) {
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
								title: 'Data has been updated'
							})   
							setTimeout(() => {
               window.location="./ViewQuantity.php";
							}, 1500);
						} else if (res == 2) {
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
								title: 'Data has not been updated'
							})
						


						}
					}

				});

			});
		});

  </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>

