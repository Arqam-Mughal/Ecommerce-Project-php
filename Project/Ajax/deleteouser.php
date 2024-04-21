<?php
include("../connection.php");

if(isset($_POST['del'])){
$del = $_POST['del'];
 $sql = "DELETE FROM `onlineuser` WHERE `order_num`='$del'";

 $run= mysqli_query($connection,$sql);

 if($run){
    // echo 1;
    $ssl = "DELETE FROM `orders` WHERE `order_num`='$del'";
    $rrun= mysqli_query($connection,$ssl);
    if($rrun){
        echo 1;
    }
 }else{
    echo 2;
 }
}

if(isset($_POST['alldel'])){
   $dell = $_POST['alldel'];
    $sql = "DELETE FROM `onlineuser`";
   
    $run= mysqli_query($connection,$sql);
   
    if($run){
       // echo 1;
       $ssl = "DELETE FROM `orders`";
       $rrun= mysqli_query($connection,$ssl);
       if($rrun){
           echo 1;
       }
    }else{
       echo 2;
    }
   }
?>