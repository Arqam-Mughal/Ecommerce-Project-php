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
  <title>Add Supplier-Page</title>
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
                      <h4>Add Supplier</h4>
                    <a href="./ViewSupplier.php" target="_blank" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="supname" class="form-control" required="">
                      </div>
                      <div class="form-group mb-3">
                        <label>Descryption</label>
                        <textarea class="form-control" name="supdes" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Enter Number</label>
                        <input type="number" name="supnum" class="form-control">
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
  <script>
    $(document).ready(function(){
      $("#sub").on("click",(e)=>{
        e.preventDefault();
        var formData = new FormData(data);
      $.ajax({
        url:"./Ajax/insert supplier.php",
        method:"POST",
        contentType:false,
        processData:false,
        data:formData,
        success:function(res){
          // alert(res);
        if(res==1){
          alert("DATA HAS BEEN INSERTED");
          $("#data").trigger("reset");
        }else{
          alert("DATA HAS NOT BEEN INSERTED");
        }
        }
      });
      });      
    });
    </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>

