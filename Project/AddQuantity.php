<?php
session_start();

if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
include("./include/header.php");
include("./include/sidebar.php");

?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Quantity-Page</title>

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
                      <h4>Add Quantity</h4>
                    <a href="./ViewQuantity.php" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quaname" class="form-control" required="">
                      </div>
                      <div class="form-group mb-3">
                        <label>Descryption</label>
                        <textarea class="form-control" name="quades" required=""></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" name="sub" id="sub" class="btn btn-primary" value="Submit">
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
    $(document).ready(function(){
      $("#sub").on("click",(e)=>{
        e.preventDefault();
      var formData = new FormData(data);
      $.ajax({
        url:"./Ajax/insert quantity.php",
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
								title: 'Data has been Inserted'
							})
          $("#data").trigger("reset");
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
								title: 'Data has not been Inserted'
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

