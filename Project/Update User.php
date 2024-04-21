<?php
include "./connection.php";
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
include "./include/header.php";
include "./include/sidebar.php";
$get = $_GET['userid'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update User</title>
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
                                  <?php
                                  $sel = "SELECT * FROM `user` u INNER JOIN `role` r ON u.rolename=r.roleid WHERE `userid`='$get'";
                                  $run = mysqli_query($connection,$sel);
                                  $fet = mysqli_fetch_assoc($run);
                                  ?>
                                    <h4>Update User</h4>
                                    <a href="./View User.php" class="btn btn-success rounded">View User</a>
                                    <!-- <a href="./ViewSupplier.php" target="_blank" class="btn btn-success">View</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>User</label>
                                        <input type="text" name="uname" class="form-control" required="" value="<?php echo $fet['uname'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="uemail" class="form-control" required="" value="<?php echo $fet['uemail'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Mobile</label>
                                        <input type="number" name="umobile" class="form-control" required="" value="<?php echo $fet['umobile'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>CNIC #</label>
                                        <input type="number" name="ucnic" class="form-control" required="" value="<?php echo $fet['ucnic'] ?>">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label>Password</label>
                                        <input type="number" name="upass" class="form-control" required="" value="<?php echo $fet['upass'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="cfmpass" class="form-control" required="" value="<?php echo $fet['cfmpass'] ?>">
                                    </div>
                                    <input type="hidden" name="userid" class="form-control" required="" value="<?php echo $fet['userid'] ?>">
                                    <div class="form-group mb-3">
                                      <select name="rolename" id="" class="form-control">

                                        <option value="<?php echo $fet['roleid']; ?>"><?php echo $fet['role']; ?></option>
                                        <?php
                                         $select = "SELECT * FROM `role`";
                                         $runn = mysqli_query($connection,$select);
                                        while($fett=mysqli_fetch_assoc($runn)){
                                        ?>
                                        <option value="<?php echo $fett['roleid']; ?>"><?php echo $fett['role']; ?></option>
                                        <?php
                                      }
                                        ?>
                                      </select>
                                    </div>
                                    
                                <div class="card-footer text-right">
                                    <input type="submit" name="sub" id="sub" value="submit" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

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
                $("#sub").on("click",function(e){
                    e.preventDefault();
				 var formData=new FormData(data);
                   $.ajax({
					url:"./Ajax/update user.php",
					method:"POST",
					contentType:false,
					processData:false,
					data:formData,
					success:function(res){
                      //  alert(res);
                        if(res==1){
                            alert("Data Has Been Updated");
						   $("form").trigger("reset");
               window.location="./View User.php";
						}else if(res==2){
                            alert("Data Has Been Not Updated");
						}else if(res=="Password Invalid!"){
              alert(res);
            }
					}
					
				   });

				});
		  });

	</script>