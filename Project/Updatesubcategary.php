<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

$subid = mysqli_real_escape_string($connection,$_GET['subid']);
 
$usql = "SELECT * FROM `subcategary` s INNER JOIN `project` c ON s.spid = c.pid WHERE `subid` = '$subid'";
$urun = mysqli_query($connection, $usql);
$ufet = mysqli_fetch_assoc($urun);

$sql = "SELECT * FROM `subcategary` where `subid`='$subid'";
$run = mysqli_query($connection,$sql);
$fet = mysqli_fetch_assoc($run);


?>


<!-- Next ---------------------- -->
<?php
include("./include/header.php");
include("./include/sidebar.php");



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
                  <h4>Update Sub-Category</h4>
                  <a href="./Viewsubcategary.php" target="_blank" class="btn btn-success">View</a>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label style="font-size:16px;">Select Category</label>
                    <br>
                    <select name="spid" class="form-control" >
                    <option value="<?php echo $ufet['pid']; ?>"><?php echo $ufet['pname']; ?></option>
                      <?php
                      $psql = "SELECT * FROM `project`";
                      $prun = mysqli_query($connection, $psql);
                      while ($pfet = mysqli_fetch_assoc($prun)) {
                      ?>
                        <option value="<?php echo $pfet['pid']; ?>"><?php echo $pfet['pname']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label style="font-size:16px;">Sub-Category Name</label>
                    <input type="text" name="subname" class="form-control" required="" placeholder="sub--category" value="<?php echo $fet['subname']; ?>">
                    <input class="form-control mb-3" value="<?php echo $fet['subid']; ?>" type="hidden" placeholder="Enter Name" name="subid">
                  </div>
                  <div class="form-group">
                    <label style="font-size:16px;">Description</label>
                    <textarea name="subdes" cols="30" rows="10" class="form-control"><?php echo $fet['subdes']; ?></textarea>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" value="Submit" id="update" name="sub" class="form-control bg-dark text-white">
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
  <script>
    $(document).ready(function () {
			
			$("#update").on("click", function (e) {
				e.preventDefault();
				var formData = new FormData(data);
        // alert(formData);
				$.ajax({
					url: "./Ajax/update subcategary.php",
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
								title: 'Data Has Been Updated'
							})
              setTimeout(() => {
               window.location="./Viewsubcategary.php";
							}, 1500);

							$("#data").trigger("reset");
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