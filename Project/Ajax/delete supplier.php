<?php
include("../connection.php");

$del = $_POST['del'];



$sdel = "DELETE FROM `supplier` WHERE `supid`='$del'";
$srun = mysqli_query($connection,$sdel);
if($srun){
    echo 1;
    header("Refresh:0,url=./ViewSupplier.php");
}else{
    echo 2;
}
?>