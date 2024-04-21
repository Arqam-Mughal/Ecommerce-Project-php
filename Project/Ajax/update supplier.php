<?php
include "../connection.php";

$supid = mysqli_real_escape_string($connection,$_POST['supid']);

$supname = mysqli_real_escape_string($connection,$_POST['supname']);
$supdes = mysqli_real_escape_string($connection,$_POST['supdes']);
$supnum = mysqli_real_escape_string($connection,$_POST['supnum']);

$upd = "UPDATE `supplier` SET `supname`='$supname',`supdes`='$supdes',`supnum`='$supnum' WHERE `supid`='$supid'";

$run = mysqli_query($connection,$upd);

if($run){
    echo 1;
}else{
    echo 2;
}


?>