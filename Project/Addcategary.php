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
  <title>Add Categary-Page</title>
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
                      <h4>Add Categary</h4>
                    <a href="./Viewcategary.php" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Categary Name</label>
                        <input type="text" name="pname" class="form-control" required="">
                      </div>
                      <div class="form-group mb-0">
                        <label>Message</label>
                        <textarea class="form-control" name="pmessage" required=""></textarea>
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

  <!-- General JS Scripts -->
    
  <script>
    $(document).ready(function(){
            $("#sub").on("click",(e)=>{
                e.preventDefault();
            var formData=new FormData(data);
            $.ajax({
                url:"../Ajax/categoryajax/insert categary.php",
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
								title: 'Data Has Been Inserted'
							})
                    $("#data").trigger("reset");
                    // window.location="./Viewcategary.php";
                  }else if (res==2) {
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
								title: 'Data has not been inserted!'
							})                    
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
								title: 'Data Already Exists!'
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

