<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
$del = $_GET['supid'];

// $sql = "SELECT * FROM `project` WHERE `pid`='$del'";
// $run = mysqli_query($connection,$sql);
// $fet = mysqli_fetch_assoc($run);

// $pic = $fet['spic'];
// if(!empty($pic)){
//     unlink("./img/".$pic);
// }

$sdel = "DELETE FROM `supplier` WHERE `supid`='$del'";
$srun = mysqli_query($connection,$sdel);
if($srun){
    header("Refresh:0,url=./ViewSupplier.php");
}
?>