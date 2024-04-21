<?php
include('include/conn.php');
include('include/header.php');
include('include/sidebar.php');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="sc_form">
                            <div class="card-header justify-content-between">
                                <h4>Sub Category</h4>
                                <?php if ($row_role["role_access"] == "All") : ?>
                                    <a class="btn btn-primary" href="./sub-cate-view.php">View</a>
                                <?php else : ?>
                                    <?php if (in_array("View Sub Category", $subcategories)) : ?>
                                        <a class="btn btn-primary" href="./sub-cate-view.php">View</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label> Category Name</label>
                                    <select name="sc_id" id="sc" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                        $tsql = "SELECT * FROM `category`";
                                        $trun = mysqli_query($conn, $tsql);
                                        while ($tfet = mysqli_fetch_assoc($trun)) {
                                        ?>
                                            <option value="<?php echo $tfet['c_id'] ?>"><?php echo $tfet['c_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="scname" id="sc_name" disabled class="form-control">
                                    <span id="e_input" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="s_csub" id="submit" disabled class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JQuery CDN -->
<!-- Sweet Alert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Sweet Alert CDN -->
<script>
    $(document).ready(function() {
        // ///SC
        $('#sc').change(function() {
            $("#sc_name").removeAttr("disabled")
        })
        // ///SC_name
        $('#sc_name').on("input", (c) => {
            var data = $('#sc_name').val();
            if (!data.match(/^[a-zA-Z0-9 ]*$/)) {
                $("#e_input").html("Invalid Input-{Only Allowed('Alphabets & Number')}");
                c.preventDefault();
            } else {
                $("#submit").removeAttr("disabled");
                $("#e_input").html("");
            }
        })
        // ///Submit
        $('#submit').on('click', function(sub) {
            sub.preventDefault();
            var formData = new FormData(sc_form);
            $.ajax({
                url: './ajax/ajax-sub-cate.php',
                method: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function(store) {
                    if (store == 1) {
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
                            title: 'PLZ FILL ALL INPUT FEILD'
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
                            icon: 'info',
                            title: 'CATEGORY / SUB CATEGORY NAME HAS BEEN ALREADY EXITED'
                        })
                        $('#sc_form').trigger("reset");
                    } else if (store == 3) {
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
                            title: 'SUB CATEGORY HAS BEEN INSERTED',
                        })
                        $('#sc_form').trigger("reset");
                    } else {
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
                            title: 'SUB CATEGORY HAS NOT BEEN INSERTED',
                        })
                    }
                }
            });
        });
    })
</script>
<?php
include('include/footer.php');
?>