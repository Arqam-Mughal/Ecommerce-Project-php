<?php

include("../connection.php");

$del = $_POST['del'];

$delete = "DELETE FROM `project` WHERE `pid`='$del'";
$run = mysqli_query($connection,$delete);

if($run){
    echo 1;
    header("Refresh:0,url=./ViewQuantity.php");
}else{
    echo 2;
}

?>