<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

//<-------- if we want to update an image then use it otherwise not important.------->

$quaid = $_GET['quaid'];
// $up = "SELECT * FROM `quantity` WHERE `quaid`='$quaid'";
// $run = mysqli_query($connection,$up);
// $fet = mysqli_fetch_assoc($run);


if(isset($_POST['sub'])){
    $quaname = $_POST['quaname'];
    $quades = $_POST['quades'];

    $sql = "UPDATE `quantity` SET `quaname`='$quaname',`quades`='$quades' WHERE `quaid` ='$quaid'";
            
    $run = mysqli_query($connection,$sql);

    if($run){
        echo "<script>alert ('DATA HAS BEEN UPDATED')<script>";
        header("Refresh:0,url=./ViewQuantity.php");
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
  <title>Update Quantity-Page</title>
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
                      <h4>Update Quantity</h4>
                    <a href="./ViewQuantity.php" target="_blank" class="btn btn-success">View</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quaname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Descryption</label>
                        <textarea name="quades" class="form-control"></textarea>
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

