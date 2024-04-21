
<?php
include "./connection.php";
session_start();

// if(empty($_SESSION['email'])){
//   header("Location:./auth-login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <?php
                $sel = "SELECT * FROM `admin` where `rolesid`=1";
                $rr = mysqli_query($connection,$sel);
                $ff = mysqli_fetch_assoc($rr);
                if(@$ff['rolesid']==1){
                ?>
                <h4>Sign up</h4>
                <?php
                }else{
                  ?>
                  <h4>Sign Up For Super Admin!</h4>
                  <?php
                }
                ?>
              </div>
              <div class="card-body">
                <form method="POST" id="data">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="fname" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="lname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <label class="text-dark">Role</label>
                  <select name="rolesid" class="form-control mb-5" id="">

                  <?php 
                  

                  if($ff['rolesid']==1){
                  $select = "SELECT * FROM `role` where `role`!='SuperAdmin'"; 
                }else{
                  $select = "SELECT * FROM `role`";
                }
                  $run = mysqli_query($connection,$select);
                  while($fet =mysqli_fetch_assoc($run)){
                    ?>
                    <option value="<?php echo $fet['roleid']; ?>"> <?php echo $fet['role']; ?></option>
                    <?php
                  }  
                  ?>
                  </select>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="cfmpass">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="sub" id="sub" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="auth-login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <?php include "./include/footer.php"; ?>

    <script>

          $(document).ready(function(){
                $("#sub").on("click",function(e){
                    e.preventDefault();
				 var formData=new FormData(data);
                   $.ajax({
					url:"./Ajax/add user.php",
					method:"POST",
					contentType:false,
					processData:false,
					data:formData,
					success:function(res){
                      //  alert(res);
                        if(res==1){
                            alert("Data Has Been Inserted");
						   $("form").trigger("reset");
                           window.location="./auth-login.php";
						}else if(res==2){
                            alert("Data Has Been Not Inserted");
						}else if(res==3){
              alert("Already Exists!");
						   $("form").trigger("reset");
                          
            }else if(res=="Password Invalid!"){
              // alert(res);
            }
					}
					
				   });

				});
		  });

	</script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>