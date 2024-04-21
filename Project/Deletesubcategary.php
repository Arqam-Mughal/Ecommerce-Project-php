<?php
include("./connection.php");
session_start();
if(empty($_SESSION['email'])){
  header("Location:./auth-login.php");
}

$del = $_GET['subid'];
 $sql = "DELETE FROM `subcategary` WHERE `subid`='$del'";

 $run= mysqli_query($connection,$sql);

 if($run){
    header("Refresh:0,url=./Viewsubcategary.php");
 }else{
    echo "Not Run";
 }
?>