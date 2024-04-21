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
  <title>View Order_Table</title>
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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Order_Table</h4>
                    <!-- <a href="./Addproduct.php" class="btn btn-success">Add New</a> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Order_ID</th>
                            <th>Order_Num</th>
                            <th>Order Name</th>
                            <th>User Email</th>
                            <th>Quantity</th>
                            <th>Order Price</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Update</th>
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

<script>
   $(document).ready(function(){
          function load(){
              $.ajax({
              url:"./Ajax/vieworder.php",
              method:"GET",
              success:function(res){
                  console.log(res);
                  $("#data").html(res);
              }
              
          });
          }
          // Function Call
          load();
          $("#show").on("click",()=>{
              load();
          });
          
          $(document).on("click", ".delete", function () {
              var oid = $(this).data("oid");
              // alert(pid);
              var msg = this;
              // alert(msg);
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
                          url: "./Ajax/deleteorder.php",
                          method: "POST",
                          data: { del: oid },
                          success: function (res) {
                          // alert(res);
                              if (res == 1) {

                                  Swal.fire(
                                      'Deleted!',
                                      'Your data has been deleted.',
                                      'success'
                                  )
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
          

      });
</script>