<?php
include("../connection.php");
if(isset($_POST['dell'])){
$del = $_POST['dell'];

$delete = "DELETE FROM `pos-cart` WHERE `posid`='$del'";
$run = mysqli_query($connection,$delete);
if($run){
    echo 1;
}else{
    echo 2;
}
}
if(isset($_POST['empty'])){
    $empty = $_POST['empty'];
$DEL = "DELETE FROM `pos-cart`";
$rrun = mysqli_query($connection,$DEL);
if($rrun){
    echo 1;
}else{
    echo 2;
}
}
?>