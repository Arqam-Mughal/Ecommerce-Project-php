<?php
include('include/conn.php');
include('include/header.php');
include('include/sidebar.php');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header justify-content-between">
              <h4>Sub Category</h4>
              <?php if ($row_role["role_access"] == "All") : ?>
                <a class="btn btn-primary" href="./sub-category.php">Add</a>
              <?php else : ?>
                <?php if (in_array("Add Sub Category", $subcategories)) : ?>
                  <a class="btn btn-primary" href="./sub-category.php">Add</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Category Name</th>
                      <th>Sub Category Name</th>
                      <th>Date</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `sub-cate` sc INNER JOIN `category` c ON sc.sc_id=c.c_id";
                    $run = mysqli_query($conn, $sql);
                    $i = 1;

                    while ($execu = mysqli_fetch_assoc($run)) {
                    ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $execu['c_name'] ?></td>
                        <td><?php echo $execu['scname'] ?></td>
                        <td><?php echo $execu['s_cdate'] ?></td>
                        <td>
                          <?php if ($row_role["role_access"] == "All") : ?>
                           <a href="./sub-cate-upda.php?update=<?php echo $execu['s_id'] ?>" class="btn btn-success">UPDATE</a>
                          <?php else : ?>
                            <?php if (in_array("Update Sub Category", $subcategories)) : ?>
                             <a href="./sub-cate-upda.php?update=<?php echo $execu['s_id'] ?>" class="btn btn-success">UPDATE</a>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                        <td>
                        <?php if ($row_role["role_access"] == "All") : ?>
                           <button class="btn btn-danger " id="delete" data-delete="<?php echo $execu['s_id']; ?>">DELETE</button>
                          <?php else : ?>
                            <?php if (in_array("Delete Sub Category", $subcategories)) : ?>
                             <button class="btn btn-danger " id="delete" data-delete="<?php echo $execu['s_id']; ?>">DELETE</button>
                            <?php endif; ?>
                          <?php endif; ?>
                          
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
  </section>>
</div>
<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JQuery CDN -->
<!-- Sweet Alert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Sweet Alert CDN -->
<script>
  $(document).ready(function(a) {
    // /////////////////////Delete Query
    $(document).on("click", "#delete", function() {
      var del = $(this).data("delete");
      var msg = this;
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: './ajax/ajax-sub-cate-del.php',
            method: "POST",
            data: {
              mydel: del
            },
            success: function(store) {
              if (store == 1) {
                $(msg).closest("tr").fadeOut();
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
                  title: 'SUB-CATEGORY HAS BEEN DELETED'
                })
              } else if (store == 2) {
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
                  icon: 'error',
                  title: 'SUB-CATEGORY HAS  NOT BEEN DELETED'
                })
              }
            }

          })
        }
      })
    })
  })
</script>
<?php
include('include/footer.php');
?>