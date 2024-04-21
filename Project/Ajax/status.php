<?php
include("../connection.php");

$get = $_POST['del'];
 $select = "SELECT  * FROM `onlineuser` WHERE `order_num`='$get'";
 $run = mysqli_query($connection,$select);
 $fet = mysqli_fetch_assoc($run);
 if(($fet['ustatus'])=='pending'){
    $update = "UPDATE `onlineuser` SET `ustatus`='complete' WHERE `order_num`='$get'";
    $urun = mysqli_query($connection,$update);
    if($urun){
        $oupd = "UPDATE `orders` SET `ostatus`='complete' WHERE `order_num`='$get'";
        $or = mysqli_query($connection,$oupd);
        echo 1;
    }
 }
 if(($fet['ustatus'])=='complete'){
    $update = "UPDATE `onlineuser` SET `ustatus`='pending' WHERE `order_num`='$get'";
    $urun = mysqli_query($connection,$update);
    if($urun){
        $oupd = "UPDATE `orders` SET `ostatus`='pending' WHERE `order_num`='$get'";
        $or = mysqli_query($connection,$oupd);
        echo 1;
    }
 }

?>