<?php
include("../connection.php");

$del = $_POST['del'];
$sdel = "DELETE FROM `onlineuser` WHERE `order_num`='$del'";
$srun = mysqli_query($connection,$sdel);
if($srun){
    // echo 1;
    $dsql = "DELETE FROM `orders` WHERE `order_num`='$del'";
    $drun = mysqli_query($connection,$dsql);
    if($drun){
        echo 1;
    }
    // header("Refresh:0,url=./ViewSupplier.php");
}else{
    echo 2;
}
?>