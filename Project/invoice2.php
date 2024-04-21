<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
$onum = $_GET['onum'];
include("./include/header.php");
include("./include/sidebar.php");
?>

<!DOCTYPE html>
<html lang="en">


<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->
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
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
   
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="invoice">
              <div class="report-print">
              <!-- <div class="invoice-print"> -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>                      
                      <div class="invoice-number">#<?php echo $onum; ?></div>
                     
                    </div>
                    
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <?php 
                        $sslq = "SELECT * FROM `onlineuser` WHERE `order_num`='$onum'";
                        $srsn = mysqli_query($connection,$sslq);
                        while($fgett = mysqli_fetch_assoc($srsn)){
                          ?>
                           <address>
                          <strong>Billed To:</strong><br>
                          <?php echo $fgett['fname']; ?><br>
                          <?php echo $fgett['address']; ?>,<br>
                          <?php echo $fgett['email']; ?><br>
                          <?php echo $fgett['peraddress']; ?>
                        </address>
                         
                       
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Shipped To:</strong><br>
                          Keith Johnson<br>
                          197 N 2000th E<br>
                          Rexburg, ID,<br>
                          Springfield Center, USA
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Payment Method:</strong><br>
                          <?php echo $fgett['pay']; ?><br>
                          <?php echo $fgett['email'] ?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          <?php echo $fgett['date']; ?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                 }
                ?>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                      
                        <tr>
                          <th data-width="40">#</th>
                          <th>Item</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Totals</th>
                        </tr>
                        <?php 
                        $slq = "SELECT * FROM `orders` WHERE `order_num`='$onum'";
                        $srn = mysqli_query($connection,$slq);
                        $gtotal=0;
                        while($fget = mysqli_fetch_assoc($srn)){
                          $gtotal=$gtotal+$fget['ptprice'];
                          ?>
                          <tr>
                          <td><?php echo $fget['oid']; ?></td>
                          <td><?php echo $fget['proname']; ?></td>
                          <td class="text-center"><?php echo $fget['psale']; ?></td>
                          <td class="text-center"><?php echo $fget['pquantity']; ?></td>
                          <td class="text-right"><?php echo $fget['ptprice']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                          invoices.</p>
                        <div class="images">
                          <img src="assets/img/cards/visa.png" alt="visa">
                          <img src="assets/img/cards/jcb.png" alt="jcb">
                          <img src="assets/img/cards/mastercard.png" alt="mastercard">
                          <img src="assets/img/cards/paypal.png" alt="paypal">
                        </div>
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value">Rs.<?php echo $gtotal; ?>.00</div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Shipping</div>
                          <div class="invoice-detail-value">Rs.00</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">Rs.<?php echo $gtotal; ?>.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </div> -->
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process
                    Payment</button>
                  <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                </div>
                <button class="btn btn-warning btn-icon icon-left printbtn"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
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
  // $(document).ready(function(){
  //   $(document).on("click",".printbtn",function(){
  //     var data = document.querySelector(".report-print").innerHTML;
  //     var body = document.getElementsByTagName("body").innerHTML;
  //     document.body.innerHTML=data;
  //     window.print();
  //     document.getElementsByTagName("body").innerHTML=body;
  //     location.reload();
  // })
  // });
      document.querySelector(".printbtn").addEventListener("click",function(){

      var data = document.querySelector(".report-print").innerHTML;
      var body = document.body.innerHTML;
      document.body.innerHTML= data;
      window.print();
      document.body.innerHTML= body;
      location.reload(true);
})
  
</script>
</body>
<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->
</html>

