<?php

include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
include("./include/sidebar.php");
?>

<!DOCTYPE html>
<html lang="en">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add POS</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
            <div class="row">
            <div class="col-lg-6 m-0 p-0">
                <div class="card py-3">
                  <div class="card-header">
                    <h4>Add Products</h4>
                    <!-- <a href="./Addproduct.php" class="btn btn-success">Add New</a> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Qty</th>
                            <th>Add</th>
                          </tr>
                        </thead>
                        <tbody id="pdata">
                        <?php
                        $psql = "SELECT * FROM `product`";

$prun = mysqli_query($connection,$psql);

while($fet = mysqli_fetch_assoc($prun)){
  ?>
  <tr align="center">
<td><?php echo $fet['pcode']; ?></td>
<td><?php echo $fet['proname']; ?></td>
<td><?php echo $fet['psale']; ?></td>
<td><?php echo $fet['pstock']; ?></td>
<td>
<input type="number" style="width:40px !important;" class="qty" name="pqname" id="pqname" value="<?php echo $fet['pqname']; ?>">
</td>
<td>
          <button class="Ibtn btn btn-danger" type="button" data-pbtn="<?php echo $fet['productid'] ; ?>" >Add</button>
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
              <div class="col-lg-6">
                <div class="card pt-3">
                  <div class="card-header">
                    <div class="container">
                    <div class="row mb-3">
                    <div class="col-9"><h4>POS</h4></div>
                    <div class="col-3 text-right"><a href="./view-pos.php" class="btn bg-cyan">View</a></div>
                    </div>
                  </div>
                  </div>
                  <div class="card-body">

                  <form id="posform">
                    <label>Invoice Number</label>
                    <input type="number" name="pos-uinvoice" id="Invoice" class="form-control Invoice py-4 mb-4 bg-light" >
                    <label>Name</label>
                    <input type="text" name="pos-uname" id="Itext" class="form-control mb-4 uname py-4" placeholder="Enter Name">
                    <label>Contact</label>
                    <input type="text" name="pos-uphone" id="Iphone" class="form-control mb-4 uphone  py-4" placeholder="Enter PhoneNumber">
                    <label>Total Cash</label>
                    <input type="text" name="tcash" id="totalcash" class="form-control mb-3 bg-light py-4 tcash" value="">
                      <label for="" class="form-label mt-2">Payment Status</label>
                      <select class="form-select form-control" name="pos-ustatus" id="" class="ustatus">
                        <option selected>Select one</option>
                        <option value="pending">pending</option>
                        <option value="complete">complete</option>
                      </select>
                     <div class="text-right mt-3">
                    <input type="submit" class="btn bg-purple sub" value="Submit">
                    </div>
                  </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card pt-3">
                      <div class="card-header">
                        <div class="container">
                        <div class="row mb-3">
                        <div class="col-9"><h4>View Cart</h4></div>
                        <div class="col-3 text-right"><a href="./Addproduct.php" class="btn btn-success bg-orange empty">Empty</a></div>
                        </div>
                      </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Qty</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody id="data">
                           
                        </tbody>
                        
                      </table>
                      </div>
                    </div>
                    
                    </div>
                    
                  </div>
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
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.28/sweetalert2.all.js" integrity="sha512-cD1xrn0N1tV0ze8axCp+noWgxMFlWVg22HBXUfowicWhJsnAcSXNKnwI77Bkn3yLyqGvwZ/a8M2PtOjVp5vMaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.28/sweetalert2.all.js"></script>
  <script>
     $(document).ready(function(){           
$(document).on("click",".Ibtn",function(e){
    e.preventDefault();
    var pid = $(this).data("pbtn");
    var form = $(this).closest("tr");
    var qnty = form.find(".qty").val();
    // alert(pid)
    // alert(qnty)
$.ajax({
    url:"./POS Ajax/Add-pos.php",
    method:"POST",
    data:{
        proid:pid,
        quantity:qnty
    },
    success:function(res){
        // alert(res);
    if(res==3){
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
								title: 'This cart is Already selected!'
							})
    }else if(res==1){
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
								title: 'Cart has been Added Succesfully.'
							})
              load();
          
            
            
            
    }else if(res==2){
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
								title: 'There is a Problem in database!'
							})
    }
    }
})
});
function load(){
                $.ajax({
                url:"./POS Ajax/view-pos.php",
                method:"GET",
                success:function(res){
                    // console.log(res);
                    $("#data").html(res);
                    var targett = document.querySelector(".targett").innerHTML;
            // alert(targett);
            var tcsh =document.querySelector("#totalcash").value=targett;
            // alert(tcsh);
                }
                
            });
            }
            // Function Call
            
            load();
          $(document).on("click",".dbtn",function(e){
            e.preventDefault();
          var del = $(this).data("del");
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
                            url: "./POS Ajax/Delete-pos.php",
                            method: "POST",
                            data: { dell: del },
                            success: function (res) {
                            // alert(res);
                                if (res == 1) {

                                    Swal.fire(
                                        'Deleted!',
                                        'Your data has been deleted.',
                                        'success'
                                    )
                                    load();
                                    $(msg).closest("tr").fadeOut();
                                } else {
                                    Swal.fire(
                                        'warning',
                                        'Your file has NOT been deleted.',
                                        'error'
                                    )
                                }
                            }
                        })

                    }
                })

            })
            
$(document).on("click",".empty",function(e){
  e.preventDefault();
  $.ajax({
    url:"./POS Ajax/Delete-pos.php",
    method:"POST",
    data:{
      empty:"myempty",
    },
    success:function(res){
      // alert(res);
      if (res == 1) {

Swal.fire(
    'Deleted!',
    'Your data has been deleted.',
    'success'
)
load();
// $(msg).closest("tr").fadeOut();
// setTimeout(() => {
// location.reload(true);
// }, 1500);
} else {
Swal.fire(
    'warning',
    'Your file has NOT been deleted.',
    'error'
)

    }
    }
  })
})
$(document).on("click",".sub",function(e){
  e.preventDefault();
var form = new FormData(posform);
$.ajax({
                url:"./POS Ajax/pos-work.php",
                method:"POST",
                contentType:false,
                processData:false,
                data:form,
                success:function(res){
                    // alert(res);
                  if(res==1){
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
								title: 'Plz enter the All the field!'
							})
                }else if(res==2){
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
								title: 'Please filled out all the fields!'
							})
                }else if(res==3){
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
								title: 'This form is Already Exists!'
							})
                }else if(res==4){
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
								title: 'Form has been added successfully.'
							})
              load();
              $("form").trigger("reset");
                }
              }
            });

})
        });
  </script>
</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>
<?php
include("./include/sidebar.php");
?>