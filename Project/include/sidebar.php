<?php
include "./connection.php";

@$email = $_SESSION['email'];
@$adminid = $_SESSION['Id'];
@$rolesid = $_SESSION['rolesid'];

  
$select = "SELECT * FROM `role` where `roleid`='$rolesid'";
$run = mysqli_query($connection,$select);
$fet = mysqli_fetch_assoc($run);
@$uns = unserialize($fet['accessto']);

?>

<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <?php
            if(in_array('category',$uns)){
              ?>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Categary</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./Addcategary.php" target="_blank">Add Categary</a></li>
                <li><a class="nav-link" href="./Viewcategary.php" target="_blank">View Categary</a></li>
              </ul>
            </li>
            <?php
            }
            if(in_array('subcategory',$uns)) {
            ?>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Sub Categary</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./AddSubCategary.php">Add-Sub-Categary</a></li>
                <li><a class="nav-link" href="./ViewSubCategary.php">View-Sub-Categary</a></li>
              </ul>
            </li>
            <?php
            }
            if(in_array('supplier',$uns)){
              ?>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Supplier</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./AddSupplier.php">Add-Supplier</a></li>
                <li><a class="nav-link" href="./ViewSupplier.php">View-Supplier</a></li>
              </ul>
            </li>
            <?php
            }
            if(in_array('quantity',$uns)){
              ?>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Quantity</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./AddQuantity.php">Add-Quantity</a></li>
                <li><a class="nav-link" href="./ViewQuantity.php">View-Quantity</a></li>
              </ul>
           
            </li>
            <?php
            }
            if(in_array('product',$uns)){
              ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Product</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./Addproduct.php">Add-Product</a></li>
                <li><a class="nav-link" href="./Viewproduct.php">View-Product</a></li>
              </ul>
           
            </li>
            <?php
            }
            if(in_array('orders',$uns)){
              ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Orders</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./onlineuser.php">onlineuser</a></li>
                <li><a class="nav-link" href="./onlineorder.php">onlineorder</a></li>
              </ul>
           
            </li>

            <?php
            }
            if(in_array('POS',$uns)){
              ?>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>POS</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./POS-addcart.php">Add POS</a></li>
                <li><a class="nav-link" href="./view-pos.php">View POS</a></li>
              </ul>
           
</li>
           <?php
            }
            if(in_array('Role',$uns)){
              ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Role</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./Add Role.php">Add Role</a></li>
                <li><a class="nav-link" href="./View Role.php">View Role</a></li>
              </ul>
           
            </li>
            <?php
            }
            if(in_array('user_management',$uns)){
              ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>User Management</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./Add User.php">Add User</a></li>
                <li><a class="nav-link" href="./View User.php">View User</a></li>
              </ul>
           
            </li>
            <?php
            }
            ?>
            <li><a class="nav-link" href="./admin-logout.php"><i data-feather="file"></i><span>Logout</span></a></li>
  
        </aside>
      </div>