<?php
  include("./include/connect.php");
  session_start();
  if(empty($_SESSION['email'])){
    header('Location: ./login.php');
  }
  include("./include/header.php");
  include("./include/sidebar.php");
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <form method="POST" action="backend.php" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Add Product</h4>
                      <a class="btn btn-primary text-right" href="./view-product.php">View Product</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="pcat" required="">
                            <option selected>Select one</option>
                            <?php
                            $catsql = "SELECT * FROM `category` ";
                            $catrun = mysqli_query($conn, $catsql);
                            while($cfetch = mysqli_fetch_assoc($catrun)){
                            ?>                                
                                <option value="<?php echo $cfetch['cid']?>"><?php echo $cfetch['cname']?></option>
                                <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Sub-Category Name</label>
                        <select class="form-control" name="psubcat" required="">
                            <option selected>Select one</option>
                            <?php
                            $subsql = "SELECT * FROM `subcategory` ";
                            $subrun = mysqli_query($conn, $subsql);
                            while($sfetch = mysqli_fetch_assoc($subrun)){
                            ?>                                
                                <option value="<?php echo $sfetch['subid']?>"><?php echo $sfetch['subname']?></option>
                                <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Supplier Name</label>
                        <select class="form-control" name="psup" required="">
                            <option selected>Select one</option>
                            <?php
                            $supsql = "SELECT * FROM `supplier` ";
                            $suprun = mysqli_query($conn, $supsql);
                            while($supfetch = mysqli_fetch_assoc($suprun)){
                            ?>                                
                                <option value="<?php echo $supfetch['supid']?>"><?php echo $supfetch['supname']?></option>
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
                        <input type="text" class="form-control" name="pname" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="pdes" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Product Cost Price</label>
                        <input type="number" class="form-control" name="pcost" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Sale Price</label>
                        <input type="number" class="form-control" name="psale" required="">
                      </div>
                      <div class="form-group">
                        <label>Quantity/Measurement Name</label>
                        <select class="form-control" name="pmes" required="">
                            <option selected>Select one</option>
                            <?php
                            $msql = "SELECT * FROM `measure` ";
                            $mrun = mysqli_query($conn, $msql);
                            while($mfetch = mysqli_fetch_assoc($mrun)){
                            ?>                                
                                <option value="<?php echo $mfetch['mid']?>"><?php echo $mfetch['mname']?></option>
                                <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Stock</label>
                        <input type="number" class="form-control" name="pstock" required="">
                      </div>
                      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
                      <div class="form-group">
                        <label>Product Pic</label><br>
                        <span data-feather="image" width="70" height="70" style="cursor:pointer" onclick="$('#inputField').click()"></span>
                        <input type="file" multiple name="ppic[]" id="inputField" style="display:none">
                      </div>
                      <div class="form-group">
                        <label>Product Status</label><br>
                        <input type="radio" class="mx-2" name="status" value="online" required="">Online
                        <input type="radio" class="mx-2" name="status" value="offline" required="">Offline
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" name="psub" >Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
<?php
  include("./include/footer.php");
?>