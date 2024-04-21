<?php
include("./connection.php");

$del = $_GET['productid'];
$sql = "SELECT `ppic` FROM `product` WHERE `productid`='$del'";
$run = mysqli_query($connection,$sql);
$fet = mysqli_fetch_assoc($run);
$pic = unserialize($fet['ppic']);

foreach ($pic as $p) {
    unlink("./img/".$p);
}
$dsql = "DELETE FROM `product` WHERE `productid`='$del'";
$drun = mysqli_query($connection,$dsql);
if($drun){
    header("location:./Viewproduct.php");
}
?>