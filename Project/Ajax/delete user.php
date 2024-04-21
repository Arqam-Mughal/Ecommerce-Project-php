<?php
include("../connection.php");

$del = $_POST['del'];

$delete = "DELETE FROM `user` WHERE `userid`='$del'";
$run = mysqli_query($connection,$delete);

if($run){
    echo 1;
}else{
    echo 2;
}
?>