<?php
include "../connection.php";
$quaid = mysqli_real_escape_string($connection,$_POST['quaid']);

$quaname = mysqli_real_escape_string($connection,$_POST['quaname']);
$quades = mysqli_real_escape_string($connection,$_POST['quades']);

$sql = "UPDATE `quantity` SET `quaname`='$quaname',`quades`='$quades' WHERE `quaid` ='$quaid'";
        
$run = mysqli_query($connection,$sql);

if($run){
    echo 1;
    // header("Refresh:0,url=./ViewQuantity.php");
}else{
    echo 2;
}


?>