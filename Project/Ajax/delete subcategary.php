<?php
include("../connection.php");

$del = $_POST['del'];
 $sql = "DELETE FROM `subcategary` WHERE `subid`='$del'";

 $run= mysqli_query($connection,$sql);

 if($run){
    echo 1;
    header("Refresh:0,url=./Viewsubcategary.php");
 }else{
    echo 2;
 }
?>