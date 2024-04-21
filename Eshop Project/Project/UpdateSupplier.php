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

if(isset($_POST['sub'])){
    $supname = $_POST['supname'];
    $supdes = $_POST['supdes'];
    $supnum = $_POST['supnum'];

    $sql = "UPDATE `supplier` SET `supname`='$supname',`supdes`='$supdes',`supnum`='$supnum' WHERE supid ='$supid'";
            
    $run = mysqli_query($connection,$sql);

    if($run){
        echo "<script>alert ('DATA HAS BEEN UPDATED')<script>";
        header("Refresh:2,url=./ViewSupplier.php");
    }else{
        echo "<script>alert ('DATA HAS NOT BEEN UPDATED')<script>";
    }

}
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
                  <form method="post">
                    <div class="card-header col-12">
                      <h4>Update Supplier</h4>
                    <a href="./ViewSupplier.php" target="_blank" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="supname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Descryption</label>
                        <textarea name="supdes" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Number</label>
                        <input type="num" name="supnum" class="form-control">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input class="btn btn-primary" type="submit" name="sub" value="Update">
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
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>

