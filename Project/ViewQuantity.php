<?php

include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

 
include "./include/header.php";
include "./include/sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>View Quantity-Page</title>
  
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
                    <h4>View Quantity</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Quantity</th>
                            <th>Descryption</th>
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
<?php
 
 include "./include/footer.php";
 ?>

  <script>
     $(document).ready(function(){
            function load(){
                $.ajax({
                url:"./Ajax/view quantity.php",
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
                var quaid = $(this).data("quaid");
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
                            url: "./Ajax/delete quantity.php",
                            method: "POST",
                            data: { del: quaid },
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
  </body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>
