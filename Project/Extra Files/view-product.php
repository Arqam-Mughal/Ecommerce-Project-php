<?php
  include("./include/connect.php");
  session_start();
  if(empty($_SESSION['email'])){
    header('Location: ./login.php');
  }
  include("./include/header.php");
  include("./include/sidebar.php");
?>
<style>
  /* table{
      table-layout: fixed;
  } */
  tr td{
    overflow: hidden;
    /* white-space: nowrap; */
  }
</style>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Product</h4>
                    <a class="btn btn-primary text-right" href="./add-product.php">Add Product</a>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Supplier</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th>Quantity/Measurement</th>
                            <th>Stock</th>
                            <th>Product Pic</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th colspan='2'>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $psql = "SELECT * FROM `product` p INNER JOIN `category` ctg ON p.pcat=ctg.cid INNER JOIN `subcategory` sub ON p.psubcat=sub.subid INNER JOIN `supplier` sup ON p.psup=sup.supid INNER JOIN `measure` m ON p.pmes=m.mid ORDER BY `cname` ";
                            $run = mysqli_query($conn, $psql);
                            while($fetch = mysqli_fetch_assoc($run)){
                            ?>
                            <tr>
                                <td><?php echo $fetch['cname']?></td>
                                <td><?php echo $fetch['subname']?></td>
                                <td><?php echo $fetch['supname']?></td>
                                <td><?php echo $fetch['pcode']?></td>
                                <td><?php echo $fetch['pname']?></td>
                                <td><?php echo $fetch['pdes']?></td>
                                <td><?php echo $fetch['pcost']?></td>
                                <td><?php echo $fetch['psale']?></td>
                                <td><?php echo $fetch['mname']?></td>
                                <td><?php echo $fetch['pstock']?></td>
                                <td>
                                    <?php
                                        $p = unserialize($fetch['ppic']);
                                    ?>
                                    <img src="./assets/img/products/<?php echo $p[0]?>" alt="Not Found" width="130" height="100">
                                </td>
                                <td><?php echo $fetch['status']?></td>
                                <td><?php echo $fetch['pdate']?></td>
                                <td>
                                    <a href="./update-product.php?pid=<?php echo $fetch['pid']?>" ><span data-feather="edit" data-toggle="tooltip" title="Update"></span></a>
                                    <a href="./backend.php?delpid=<?php echo $fetch['pid']?>" ><span data-feather="trash-2" data-toggle="tooltip" title="Delete"></span></a>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
<?php
  include("./include/footer.php");
?>