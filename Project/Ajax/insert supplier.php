<?php
include("../connection.php");

    $supname = mysqli_real_escape_string ($connection,$_POST['supname']);
    $supdes = mysqli_real_escape_string($connection,$_POST['supdes']);
    $supnum = mysqli_real_escape_string($connection,$_POST['supnum']);

    $sql = "INSERT INTO `supplier`(`supname`, `supdes`, `supnum`) VALUES ('$supname','$supdes','$supnum')";
    $run = mysqli_query($connection,$sql);
    if($run){
      echo 1;
    // header("Refresh:0,url=../ViewSupplier.php");
    }else{
        echo 2;
    }

?>