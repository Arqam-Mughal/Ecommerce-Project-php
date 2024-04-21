<?php

include("./connection.php");
session_start();

if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $password = mysqli_real_escape_string($connection,md5($_POST['password']));
  $role = mysqli_real_escape_string($connection,$_POST['rolesid']);

  $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`= '$password'";
  $run = mysqli_query($connection,$sql);
  $fet = mysqli_fetch_assoc($run);

  if(mysqli_num_rows($run)>0){
    $_SESSION['email'] = $email;
    $_SESSION['Id'] = $fet['adminid'];
    $_SESSION['rolesid'] = $role;
// $_SESSION['status']=="superadmin";

    if($_SESSION['rolesid'] == $fet['rolesid']){
    header("Location:./index.php");
    }else{
      echo "<script>alert ('Enter Right Role');</script>";
    }
  }else{
    echo "<script>alert ('Wrong paswword');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
                <a href="./RoleLogin.php" class="btn btn-warning float-right">Add Role</a>
              </div>
              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <label class="text-dark">Role</label>
                  <select name="rolesid" class="form-control mb-5" id="">
                    <?php 
                  $select = "SELECT * FROM `role`";
                  $run = mysqli_query($connection,$select);
                  while($fet =mysqli_fetch_assoc($run)){
                    ?>
                    <option value="<?php echo $fet['roleid']; ?>"> <?php echo $fet['role']; ?></option>
                    <?php
                  }  
                  ?>
                  </select>
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="form-group">
                    <a href="./auth-register.php"><button class="btn btn-warning rounded-pill" type="button">Sign up</button>
                  </div>
                </form>
               
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
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


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>