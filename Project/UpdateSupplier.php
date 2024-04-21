<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

$supid = $_GET['supid'];

$up = "SELECT * FROM `supplier` WHERE `supid`='$supid'";
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
                      <h4>Update Supplier</h4>
                    <a href="./ViewSupplier.php" target="_blank" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="supname" class="form-control" value="<?php echo $fet['supname'] ?>">
                        <input type="hidden" name="supid" value="<?php echo $fet['supid']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Descryption</label>
                        <textarea name="supdes" class="form-control"><?php echo $fet['supname'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Number</label>
                        <input type="num" name="supnum" class="form-control" value="<?php echo $fet['supnum'] ?>">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input class="btn btn-primary" id="update" type="submit" name="sub" value="Update">
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
  $(document).ready(function(){
    $("#update").on("click",function(e){
      e.preventDefault();
      var formdata = new FormData(data);
      $.ajax({
        url: "./Ajax/update supplier.php",
        method: "POST",
        contentType:false,
        processData:false,
        data:formdata,
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
								title: 'Data Has Been Updated'
							})

              setTimeout(() => {
								window.location="./Viewsupplier.php";
							}, 1500);

        }else if(res==2){
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
      })
    })
  })
</script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>

