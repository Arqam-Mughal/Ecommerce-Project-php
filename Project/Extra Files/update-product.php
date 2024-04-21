<?php
  include("./include/connect.php");
  session_start();
  $pid = $_GET['pid'];
  $psql = "SELECT * FROM `product` WHERE `pid` = '$pid' ";
  $prun = mysqli_query($conn, $psql);
  $fetch = mysqli_fetch_assoc($prun);

  if(isset($_POST['sub'])){
    $pcat = mysqli_real_escape_string($conn, $_POST['pcat']);
    $psubcat = mysqli_real_escape_string($conn, $_POST['psubcat']);
    $psup = mysqli_real_escape_string($conn, $_POST['psup']);
    $pmes = mysqli_real_escape_string($conn, $_POST['pmes']);
    $pcode = mysqli_real_escape_string($conn, $_POST['pcode']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pdes = mysqli_real_escape_string($conn, $_POST['pdes']);
    $pcost = mysqli_real_escape_string($conn, $_POST['pcost']);
    $psale = mysqli_real_escape_string($conn, $_POST['psale']);
    $pstock = mysqli_real_escape_string($conn, $_POST['pstock']);
    $ppic = $_FILES['ppic']['name'];
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $pdate = date("Y/m/d");
    
    if(!empty($ppic[0])){
        // if new pic inserted
        $extn = array('jpg','png','jpeg','jfif','JFIF','JPG','PNG','JPEG');
        $p = array();
        foreach($ppic as $val){
            $exe = pathinfo($val, PATHINFO_EXTENSION);
            if(in_array($exe, $extn)){
              $p[] = rand(10000, 99999).".".$exe;
              $msg = 'right';
            }else{
              $msg = 'not right';
              break;
            }
        }
        if($msg == 'right'){    
          // Delete old pics
          $pics =unserialize($fetch['ppic']);
          foreach($pics as $i){
            unlink('./assets/img/products/'.$i);
          }
          // Update record
          $ps = serialize($p);
          $update = "UPDATE `product` SET `pcat`='$pcat', `psubcat`='$psubcat', `psup`='$psup', `pmes`='$pmes', `pcode`='$pcode', `pname`='$pname', `pdes`='$pdes', `pcost`='$pcost', `psale`='$psale', `pstock`='$pstock', `ppic`='$ps', `status`='$status', `pdate`='$pdate' WHERE `pid` = '$pid'";
          $run = mysqli_query($conn,$update);
          if($run){
            foreach($p as $key=>$i){
              move_uploaded_file($_FILES['ppic']['tmp_name'][$key], './assets/img/products/'.$i);
            }
            echo "<script> alert('Product Updated with New Pics!')</script>";
            header('Refresh:0, url=./view-product.php');
          }
          else{
            echo "<script> alert('Product Not Updated!')</script>";
          }
        }
        else{
            echo "<script> alert('Invalid Image!')</script>";
        }
    }
    else{
      // if new pics not inserted
      $update = "UPDATE `product` SET `pcat`='$pcat', `psubcat`='$psubcat', `psup`='$psup', `pmes`='$pmes', `pcode`='$pcode', `pname`='$pname', `pdes`='$pdes', `pcost`='$pcost', `psale`='$psale', `pstock`='$pstock', `status`='$status', `pdate`='$pdate' WHERE `pid` = '$pid'";
      $run = mysqli_query($conn,$update);
      if($run){
        echo "<script> alert('Product Updated with Old Pics!')</script>";
        header('Refresh:0, url=./view-product.php');
      }
      else{
        echo "<script> alert('Product Not Updated!')</script>";
      }
    }
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
                  <form method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Update Product</h4>
                      <a class="btn btn-primary text-right" href="./view-product.php">View Product</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="pcat" required="">
                            <option>Select one</option>
                            <?php
                            $catsql = "SELECT * FROM `category` ";
                            $catrun = mysqli_query($conn, $catsql);
                            while($cfetch = mysqli_fetch_assoc($catrun)){
                                if($cfetch['cid']==$fetch['pcat']){
                                ?>                                
                                    <option value="<?php echo $cfetch['cid']?>" selected><?php echo $cfetch['cname']?></option>
                                <?php
                                }else{
                                ?>                                
                                    <option value="<?php echo $cfetch['cid']?>"><?php echo $cfetch['cname']?></option>
                                <?php        
                                }
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
                                if($sfetch['subid']==$fetch['psubcat']){
                                ?>                                
                                    <option value="<?php echo $sfetch['subid']?>" selected><?php echo $sfetch['subname']?></option>
                                <?php
                                }else{
                                ?>                                
                                    <option value="<?php echo $sfetch['subid']?>"><?php echo $sfetch['subname']?></option>
                                <?php        
                                }
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
                                if($supfetch['supid']==$fetch['psup']){
                                ?>                                
                                    <option value="<?php echo $supfetch['supid']?>" selected><?php echo $supfetch['supname']?></option>
                                <?php
                                }else{
                                ?>                                
                                    <option value="<?php echo $supfetch['supid']?>"><?php echo $supfetch['supname']?></option>
                                <?php        
                                }
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="number" class="form-control" name="pcode" value="<?php echo $fetch['pcode']?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="pname" value="<?php echo $fetch['pname']?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="pdes" required=""><?php echo $fetch['pdes']?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Product Cost Price</label>
                        <input type="number" class="form-control" name="pcost" value="<?php echo $fetch['pcost']?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Product Sale Price</label>
                        <input type="number" class="form-control" name="psale" value="<?php echo $fetch['psale']?>" required="">
                      </div>
                      <div class="form-group">
                        <label>Quantity/Measurement Name</label>
                        <select class="form-control" name="pmes" required="">
                            <option selected>Select one</option>
                            <?php
                            $msql = "SELECT * FROM `measure` ";
                            $mrun = mysqli_query($conn, $msql);
                            while($mfetch = mysqli_fetch_assoc($mrun)){
                                if($mfetch['mid']==$fetch['pmes']){
                                ?>                                
                                    <option value="<?php echo $mfetch['mid']?>" selected><?php echo $mfetch['mname']?></option>
                                <?php
                                }else{
                                ?>                                
                                    <option value="<?php echo $mfetch['mid']?>"><?php echo $mfetch['mname']?></option>
                                <?php        
                                }
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Stock</label>
                        <input type="number" class="form-control" name="pstock" value="<?php echo $fetch['pstock']?>" required="">
                      </div>
                      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
                      <div class="form-group">
                        <label>Product Pic</label><br>
                        <span data-feather="image" width="70" height="70" style="cursor:pointer" onclick="$('#inputField').click()"></span>
                        <input type="file" multiple name="ppic[]" id="inputField" style="display:none">
                      </div>
                      <div class="form-group">
                        <label>Product Status</label><br>
                        <?php
                          if($fetch['status']=='online'){
                        ?>
                            <input type="radio" class="mx-2" name="status" value="online" required="" checked>Online
                            <input type="radio" class="mx-2" name="status" value="offline" required="">Offline
                        <?php
                          }else{
                        ?>
                            <input type="radio" class="mx-2" name="status" value="online" required="">Online
                            <input type="radio" class="mx-2" name="status" value="offline" required="" checked>Offline
                        <?php
                          }
                        ?>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" name="sub" >Update</button>
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