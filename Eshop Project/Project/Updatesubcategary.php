<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

$subid = $_GET['subid'];
// $up = "SELECT * FROM `subcategary` s INNER JOIN `project` p ON s.spid=p.pid WHERE `subid` = '$subid'";
// $run = mysqli_query($connection, $up);
// $fet = mysqli_fetch_assoc($run);

if (isset($_POST['sub'])) {
  $pid = $_POST['spid'];
  $subname = $_POST['subname'];
  $subdes = $_POST['subdes'];
  $sql = "UPDATE `subcategary` SET `spid`='$pid',`subname`='$subname',`subdes`='$subdes' WHERE `subid` ='$subid'";

  $run = mysqli_query($connection, $sql);

  if ($run) {
    echo "DATA HAS BEEN UPDATED";
    header("Refresh:0,url=./Viewsubcategary.php");
  } else {
    echo "DATA HAS NOT BEEN UPDATED";
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
                  <h4>Update Sub-Category</h4>
                  <a href="./Viewsubcategary.php" target="_blank" class="btn btn-success">View</a>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label style="font-size:16px;">Select Category</label>
                    <br>
                    <select name="spid" class="form-control" >
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
                    <input type="text" name="subname" class="form-control" required="" placeholder="sub--category">
                  </div>
                  <div class="form-group">
                    <label style="font-size:16px;">Description</label>
                    <textarea name="subdes" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" value="Submit" name="sub" class="form-control bg-dark text-white">
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
      <a href="templateshub.net">Made By Ali</a></a>
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