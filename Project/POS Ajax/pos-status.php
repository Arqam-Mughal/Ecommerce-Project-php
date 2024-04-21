<?php
include("../connection.php");

$get = $_POST['del'];
 $select = "SELECT  * FROM `pos-userinfo` WHERE `pos-uinvoice`='$get'";
 $run = mysqli_query($connection,$select);
 $fet = mysqli_fetch_assoc($run);
 if(($fet['pos-ustatus'])=='pending'){
    $update = "UPDATE `pos-userinfo` SET `pos-ustatus`='complete' WHERE `pos-uinvoice`='$get'";
    $urun = mysqli_query($connection,$update);
    if($urun){
        $oupd = "UPDATE `pos-orderinfo` SET `pos-pstatus`='complete' WHERE `pos-pinvoice`='$get'";
        $or = mysqli_query($connection,$oupd);
        echo 1;
    }
 }
 if(($fet['pos-ustatus'])=='complete'){
    $update = "UPDATE `pos-userinfo` SET `pos-ustatus`='pending' WHERE `pos-uinvoice`='$get'";
    $urun = mysqli_query($connection,$update);
    if($urun){
        $oupd = "UPDATE `pos-orderinfo` SET `pos-pstatus`='pending' WHERE `pos-pinvoice`='$get'";
        $or = mysqli_query($connection,$oupd);
        echo 1;
    }
 }

?>