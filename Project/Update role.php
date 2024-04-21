<?php
include "./connection.php";
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
include "./include/header.php";
include "./include/sidebar.php";
$get = $_GET['roleid'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Role</title>
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
                          <?php
                          $select = "SELECT * FROM `role` WHERE `roleid`='$get'";
                          $run = mysqli_query($connection,$select);
                          while($fet=mysqli_fetch_assoc($run)){

                          ?>
                            <form id="data">
                                <div class="card-header col-12">
                                    <h4>Add Role</h4>
                                    <!-- <a href="./ViewSupplier.php" target="_blank" class="btn btn-success">View</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Role</label>
                                        
                                        <input type="text" name="rname" class="form-control" required="" value="<?php echo $fet['role']; ?>">
                                    </div>
                                    <div class="form-group">
                                                                                
                                        <input type="hidden" name="roleid" class="form-control" required="" value="<?php echo $fet['roleid']; ?>">
                                    
                                    <div class="form-group mb-3">
                                        
                                        <label>Access</label>

                                        <select name="Access" class="form-control" onchange="myfunc(this)" value="<?php echo $fet['Access']; ?>">
                                            <option><?php echo $fet['Access'] ?></option>
                                            <?php 
                                            if($fet['Access']=="Custom"){
                                              ?>
                                              <option value="All">All</option>                                  
                                              <?php
                                            }else{
                                              ?>
                                              <option value="Custom">Custom</option>
                                              <?php
                                            }
                                            ?>
                                        </select>
                                         <?php
                                         if($fet['Access']=="Custom"){
                                         ?>
                                        <div id="custom" style="display: block;"><br>
                                        <?php
                                         }else{
                                          ?>
                                          <div id="custom" style="display: none;"><br>
                                          <?php
                                         }
                                        ?>
                                        <?php
                                        
                                        $arr = unserialize($fet['accessto']);
                                        if(in_array("category",$arr)){
                                          
                                        ?>
                                            <label><input type="checkbox" name="setting[]" value="category" checked> Category</label><br>
                                            <?php
                                        }else{
                                          ?>
                                           <label><input type="checkbox" name="setting[]" value="category"> Category</label><br>
                                          <?php
                                        }
                                        if(in_array("subcategory",$arr)){
                                            ?>
                                            <label><input type="checkbox" name="setting[]" value="subcategory" checked> Subcategory</label><br>
                                            <?php
                                            }else{
                                              ?>
                                              <label><input type="checkbox" name="setting[]" value="subcategory"> Subcategory</label><br>
                                              <?php
                                            }
                                            if(in_array("product",$arr)){
                                            ?>
                                            <label><input type="checkbox" name="setting[] " value="product" checked> Product</label><br>
                                            <?php
                                            }else{
                                              ?>
                                              <label><input type="checkbox" name="setting[] " value="product"> Product</label><br>
                                              <?php
                                            }
                                            if(in_array("supplier",$arr)){
                                            ?>
                                            <label><input type="checkbox" name="setting[] " value="supplier" checked> Supplier </label><br>
                                            <?php
                                            }else{
                                              ?>
                                               <label><input type="checkbox" name="setting[] " value="supplier"> Supplier</label><br>
                                              <?php
                                            }
                                            if(in_array("orders",$arr)){
                                            ?>
                                            <label><input type="checkbox" name="setting[] " value="orders" checked> Orders </label><br>
                                            <?php
                                            }else{
                                              ?>
                                               <label><input type="checkbox" name="setting[] " value="orders"> Orders</label><br>
                                              <?php
                                            }
                                            if(in_array("quantity",$arr)){
                                            ?>
                                            <label><input type="checkbox" name="setting[] " value="quantity" checked> quantity</label><br>
                                            <?php
                                            }else{
                                              
                                              ?>
                                              <label><input type="checkbox" name="setting[] " value="quantity"> quantity</label><br>
                                              <?php
                                            }
                                            if(in_array("Role",$arr)){
                                              ?>
                                              <label><input type="checkbox" name="setting[] " value="Role" checked> User Management</label><br>
                                              <?php
                                            }else{
                                              ?>
                                            <label><input type="checkbox" name="setting[] " value="Role"> User Management</label><br>
                                              <?php
                                            }
                                            if(in_array("POS",$arr)){
                                          ?>
                                            <label><input type="checkbox" name="setting[] " value="POS" checked> POS </label><br>
                                            <?php
                                            }else{
                                              ?>
                                              <label><input type="checkbox" name="setting[] " value="POS"> POS </label><br>
                                              <?php
                                            }
                                            ?>
                                        </div>
                                                                                    
                                            <div id="All" style="display: none;">
                                            <input type="hidden" name="Assess[]" value="category"> 
                                            <input type="hidden" name="Assess[]" value="subcategory">
                                            <input type="hidden" name="Assess[] " value="product"> 
                                            <input type="hidden" name="Assess[] " value="supplier">
                                            <input type="hidden" name="Assess[] " value="orders">
                                            <input type="hidden" name="Assess[] " value="quantity">
                                            <input type="hidden" name="Assess[] " value="Role">
                                            <input type="hidden" name="Assess[] " value="POS"> 

                                            
                                        </div>


                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" name="sub" id="sub" value="submit" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>
                        <?php
                          }
                        ?>
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
     
    function myfunc(select) {
        var customm = document.getElementById("custom");
        var Alll = document.getElementById("All");

        if (select.value === "Custom") {
            customm.style.display = "block";
            Alll.style.display = "none";
        } else if (select.value === "All") {
            customm.style.display = "none";
            Alll.style.display = "block";
        } else {
            customm.style.display = "none";
            Alll.style.display = "none";
        }
    }
    </script>
    <script>

          $(document).ready(function(){
                $("#sub").on("click",function(e){
                    e.preventDefault();
                    // alert("run");
				 var formData=new FormData(data);
                   $.ajax({
					url:"./Ajax/update role.php",
					method:"POST",
					contentType:false,
					processData:false,
					data:formData,
					success:function(res){
                      //  alert(res);
                        if(res==1){
                            alert("Data Has Been Updated");
                            var custommm = document.getElementById("custom");
                            custommm.style.display = "none";
                          window.location="./View Role.php";
						   $("form").trigger("reset");
						}else{
                            alert("Data Has Been Not Updated");
						
                           
						
						}
					}
					
				   });

				});
		  });

	</script>