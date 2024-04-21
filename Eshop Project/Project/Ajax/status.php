<?php
include("../connection.php");

$onum = $_POST['onumber'];
$select = "SELECT * FROM `onlineuser` WHERE `order_num`='$onum'";
$run = mysqli_query($connection,$select);
$fet = mysqli_fetch_assoc($run);
if($fet['ustatus']=="pending"){
    $upd = "UPDATE `onlineuser` set `ustatus`='complete' WHERE `order_num`='$onum'";
    $urn = mysqli_query($connection,$upd);
    if($urn){
    $selct = "SELECT * FROM `orders` WHERE `order_num`='$onum'";
    $rbun = mysqli_query($connection,$selct);
    $fet = mysqli_fetch_assoc($rbun);
    
    $updd = "UPDATE `orders` set `ostatus`='complete' WHERE `order_num`='$onum'";
    $urnn = mysqli_query($connection,$updd);
    if($urnn){
        echo 6;
    }
}
}else if($fet['ustatus']=="complete"){
    $upd = "UPDATE `onlineuser` set `ustatus`='pending' WHERE `order_num`='$onum'";
    $urn = mysqli_query($connection,$upd);
    if($urn){
    $selct = "SELECT * FROM `orders` WHERE `order_num`='$onum'";
    $rbun = mysqli_query($connection,$selct);
    $fet = mysqli_fetch_assoc($rbun);
    
    $updd = "UPDATE `orders` set `ostatus`='pending' WHERE `order_num`='$onum'";
    $urnn = mysqli_query($connection,$updd);
    if($urnn){
        echo 6;
    }
}
}

?>