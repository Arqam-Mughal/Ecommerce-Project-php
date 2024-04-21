<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header('Location: ./auth-login.php');
}

$productid = $_GET['productid'];

$usql = "SELECT * FROM `product` p INNER JOIN `project` pro ON p.pcname=pro.pid INNER JOIN `subcategary` sub ON p.psubname=sub.subid INNER JOIN `supplier` sup ON p.psupname=sup.supid INNER JOIN `quantity` qua ON p.pqname=qua.quaid WHERE `productid`='$productid' ";

$urun = mysqli_query($connection,$usql);
$ufet = mysqli_fetch_assoc($urun);
$upic = unserialize($ufet['ppic']);
// print_r($upic);


?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Update Product</title>
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
                  <h4>Update Product</h4>
                  <a href="./Viewproduct.php" class="btn btn-warning btn-sm">View</a>
                </div>
                <div class="card-body p-4">
                  <div class="form-group">
                    <label>Select Categary</label>
                    <select class="form-control" name="pcname" required="">

                      <option value="<?php echo $ufet['pid']; ?>">
                        <?php echo $ufet['pname']; ?>
                      </option>
                      <?php
                               $asql = "SELECT * FROM `project` ";
                             $arun = mysqli_query($connection, $asql);
                             while($afet = mysqli_fetch_assoc($arun)){
                            ?>
                      <option value="<?php echo $afet['pid']; ?>"><?php echo $afet['pname']; ?>
                      </option>
                      <?php
                            }
                            ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sub Categary Name</label>
                    <select name="psubname" class="form-control">
                    <option value="<?php echo $ufet['subid']; ?>">
                        <?php echo $ufet['subname']; ?>
                      <?php
                            $bsql = "SELECT *FROM `subcategary`";
                            $brun = mysqli_query($connection,$bsql);
                            while($bfet = mysqli_fetch_assoc($brun)){
                            ?>
                      <option value="<?php echo $bfet['subid']; ?>">
                        <?php echo $bfet['subname']; ?>
                      </option>
                      <?php
                            }
                            ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Supplier Name</label>
                    <select name="psupname" class="form-control">
                    <option value="<?php echo $ufet['supid']; ?>">
                        <?php echo $ufet['supname']; ?>
                      </option>
                      <?php
                        $csql = "SELECT * FROM `supplier`";
                        $crun = mysqli_query($connection,$csql);
                        while($cfet = mysqli_fetch_assoc($crun)){
                        ?>
                      <option value="<?php echo $cfet['supid']; ?>">
                        <?php echo $cfet['supname']; ?>
                      </option>
                      <?php
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Code</label>
                    <input type="number" class="form-control" name="pcode" required=""
                      value="<?php echo $ufet['pcode']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="proname" required=""
                      value="<?php echo $ufet['proname']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" name="pdes" required=""><?php echo $ufet['pdes']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product_Cost_Price</label>
                    <input type="number" class="form-control" name="pcost" required=""
                      value="<?php echo $ufet['pcost']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Product Sale Price</label>
                    <input type="number" class="form-control" name="psale" required=""
                      value="<?php echo $ufet['psale']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Quantity Name</label>
                    <select name="pqname" class="form-control">
                      <option value="<?php echo $ufet['quaid']; ?>"><?php echo $ufet['quaname']; ?></option>
                      <?php
                          $dsql = "SELECT * FROM `quantity`";
                          $drun = mysqli_query($connection,$dsql);
                          while($dfet = mysqli_fetch_assoc($drun)){                        
                        ?>
                      <option value="<?php echo $dfet['quaid']; ?>">
                        <?php echo $dfet['quaname'] ?>
                      </option>
                      <?php
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Product Stock</label>
                    <input type="number" class="form-control" name="pstock" required=""
                      value="<?php echo $ufet['pstock']; ?>">
                    <input type="hidden" name="productid" id="" value="<?php echo $ufet['productid']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Product Image</label><br>
                    <span data-feather="image" width="40" height="40" style="cursor:-webkit-grab; color:darkgoldenrod;"
                      onclick="$('#inputField').click()"></span>
                    <input type="file" multiple name="ppic[]" id="inputField" style=""><?php foreach ($upic as $value) {
                      echo $value.",";
                    } ?>
                    <!-- <input type="file" multiple name="ppic[]" id="inputField" style="display:none"> -->
                  </div>

                  <div class="form-group">
                    <label>Product Status</label>
                    <br>
                    <div class="table-bordered p-2 bg-light rounded">
                      <?php 
                      if($ufet['status']=="online"){
                       ?>
                      <input type="radio" name="status" class="mx-2" value="online" checked>Online
                      <br>
                      <input type="radio" name="status" class="mx-2" value="offline">Offline
                      <?php
                      }else{
                        ?>
                        <input type="radio" name="status" class="mx-2" value="online">Online
                        <br>
                        <input type="radio" name="status" class="mx-2" value="offline" checked>Offline
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <input type="submit" value="submit" id="update" name="sub" class="btn btn-dark">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <?php
  include "./include/footer.php";
  ?>
  </div>
  </div>


  <script>
    $(document).ready(function () {

      $("#update").on("click", function (e) {
        e.preventDefault();
        var formData = new FormData(data);
        // alert(formData);
        $.ajax({
          url: "./Ajax/update product.php",
          method: "POST",
          contentType: false,
          processData: false,
          data: formData,
          success: function (res) {
            // alert(res);
            if (res == 1) {

              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: 'Data Has Been Updated'
              })
              setTimeout(() => {
								window.location="./Viewproduct.php";
							}, 1500);

              $("#data").trigger("reset");
            } else if (res == 2) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'warning',
                title: 'Data has not been updated'
              })



            }
          }

        });

      });
    });

  </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>