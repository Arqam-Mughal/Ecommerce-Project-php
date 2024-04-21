<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header('Location: ./auth-login.php');
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
  <title>Otika - Admin Dashboard Template</title>
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
                    <div class="card-header">
                      <h4>Add Product</h4>
                      <a href="./Viewproduct.php" class="btn btn-warning btn-sm">View</a>
                    </div>
                    <div class="card-body p-4">
                      <div class="form-group">
                      <label>Select Categary</label>
                        <select class="form-control" name="pcname" required="">
                            <option selected>---</option>
                            <?php
                            $asql = "SELECT * FROM `project` ";
                            $arun = mysqli_query($connection, $asql);
                            while($afet = mysqli_fetch_assoc($arun)){
                            ?>                                
                                <option value="<?php echo $afet['pid']; ?>"><?php echo $afet['pname']; ?></option>
                                <?php
                            }
                            ?>                    
                       </select>
                      </div>
                      <div class="form-group">
                        <label>Sub Categary Name</label>
                        <select name="psubname" class="form-control">
                            <option value="selected">---</option>
                            <?php
                            $bsql = "SELECT *FROM `subcategary`";
                            $brun = mysqli_query($connection,$bsql);
                            while($bfet = mysqli_fetch_assoc($brun)){
                            ?>
                            <option value="<?php echo $bfet['subid']; ?>"><?php echo $bfet['subname']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Supplier Name</label>
                        <select name="psupname" class="form-control">
                        <option value="selected">---</option>

                        <?php
                        $csql = "SELECT * FROM `supplier`";
                        $crun = mysqli_query($connection,$csql);
                        while($cfet = mysqli_fetch_assoc($crun)){
                        ?>
                        <option value="<?php echo $cfet['supid']; ?>"><?php echo $cfet['supname']; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="number" class="form-control" name="pcode" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="proname" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="pdes" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Product_Cost_Price</label>
                        <input type="number" class="form-control" name="pcost" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Sale Price</label>
                        <input type="number" class="form-control" name="psale" required="">
                      </div>
                      <div class="form-group">
                        <label>Quantity Name</label>
                        <select name="pqname" class="form-control">
                        <option value="selected">---</option>
                        <?php
                          $dsql = "SELECT * FROM `quantity`";
                          $drun = mysqli_query($connection,$dsql);
                          while($dfet = mysqli_fetch_assoc($drun)){                        
                        ?>
                        <option value="<?php echo $dfet['quaid']; ?>"><?php echo $dfet['quaname'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Product Stock</label>
                        <input type="number" class="form-control" name="pstock" required="">
                      </div>

                      <div class="form-group">
                        <label>Product Image</label><br>
                        <span data-feather="image" width="40" height="40" style="cursor:-webkit-grab; color:darkgoldenrod;" onclick="$('#inputField').click()"></span>
                        <input type="file" multiple name="ppic[]" id="inputField" style="">
                        <!-- <input type="file" multiple name="ppic[]" id="inputField" style="display:none"> -->
                      </div>

                      <div class="form-group">
                        <label>Product Status</label>
                        <br>
                        <div class="table-bordered p-2 bg-light rounded">
                        <input type="radio" name="status" class="mx-2" value="online">Online
                        <br>
                        <input type="radio" name="status" class="mx-2" value="offline">Offline
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" value="submit" name="sub" id="sub" class="btn btn-dark">
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
            var formData=new FormData(data);
            $.ajax({
                url:"./Ajax/insert product.php",
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
                    alert("Invalid Img!");
                  }
                }
            });
            });         
        });
  </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>