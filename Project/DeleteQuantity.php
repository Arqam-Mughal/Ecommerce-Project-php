<?php

include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}
$del = $_GET['quaid'];

$delete = "DELETE FROM `quantity` WHERE `quaid`='$del'";
$run = mysqli_query($connection,$delete);

if($run){
    echo "<script>alert ('Data has been deleted')</script>";
    header("Refresh:0,url=./ViewQuantity.php");
}

?>