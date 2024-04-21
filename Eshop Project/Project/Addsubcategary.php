<?php
include("./connection.php");
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
    <title>Add Sub Categary</title>
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
                                    <h4>Add Sub-Category</h4>
                                    <a href="./Viewsubcategary.php" target="_blank" class="btn btn-success">View</a>
                                </div>
                                <div class="card-body">
                                  <div class="form-group">
                                    <label style="font-size:16px;">Select Categary</label>
                                    <br>
                                    <select class="form-control" name="pid">

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
                                        <input type="text" name="subname" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:16px;">Sub-Category Description</label>
                                        <textarea name="subdes" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="submit" value="Submit" name="sub" id="sub" class="form-control bg-primary text-white">
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
            $("#sub").on("click",(e)=>{
                e.preventDefault();
            var formData=new FormData(data);
            $.ajax({
                url:"./Ajax/insert subcategary.php",
                method:"POST",
                contentType:false,
                processData:false,
                data:formData,
                success:function(res){
                    // alert(res);
                  if(res==1){
                    alert("DATA HAS BEEN INSERTED");
                    $("#data").trigger("reset");
                  }else if (res==2) {
                    alert("DATA HAS NOT BEEN INSERTED");                    
                  }else{
                    alert("File Already exists!");
                  }
                }
            });
            });         
        });
  </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
<?php

include("./include/footer.php");

?>