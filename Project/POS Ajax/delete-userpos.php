<?php
include("../connection.php");

$del = $_POST['del'];
 $sql = "DELETE FROM `pos-userinfo` WHERE `pos-uinvoice`='$del'";

 $run= mysqli_query($connection,$sql);

 if($run){
    // echo 1;
    $ssl = "DELETE FROM `pos-orderinfo` WHERE `pos-pinvoice`='$del'";
    $rrun= mysqli_query($connection,$ssl);
    if($rrun){
        echo 1;
    }
 }else{
    echo 2;
 }
?>