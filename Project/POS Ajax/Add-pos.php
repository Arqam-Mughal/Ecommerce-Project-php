<?php
include("../connection.php");
session_start();
 $email = $_SESSION['email'];
$prid = $_POST['proid'];
$quantity = $_POST['quantity'];

$select = "SELECT * FROM `product` WHERE `productid`='$prid'";
$run = mysqli_query($connection,$select);
$fet = mysqli_fetch_assoc($run);

$code = $fet['pcode'];
$name = $fet['proname'];
$sprice = $fet['psale'];
$stock = $fet['pstock'];
$tprice = $sprice*$quantity;

$slect = "SELECT * FROM `pos-cart` WHERE `code`='$code' AND `email`='$email'";
$srun = mysqli_query($connection,$slect);
if(mysqli_num_rows($srun)>0){
    echo 3;
}else{
    $insert = "INSERT INTO `pos-cart`(`code`,`name`,`price`,`qty`,`stock`,`total`,`email`)VALUES('$code','$name','$sprice','$quantity','$stock','$tprice','$email')";
    $irun = mysqli_query($connection,$insert);
    if($irun){
        echo 1;
    }else{
        echo 2;
    }
}

?>
