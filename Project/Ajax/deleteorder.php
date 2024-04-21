<?php
include("../connection.php");

if(isset($_POST['del'])){
$del = $_POST['del'];
 $sql = "DELETE FROM `orders` WHERE `order_num`='$del'";

 $run= mysqli_query($connection,$sql);

 if($run){
    echo 1;
 }else{
    echo 2;
 }
}


if(isset($_POST['alldel'])){
   $delete = $_POST['alldel'];

   $d1 = "DELETE FROM `orders`";
   $r1 = mysqli_query($connection, $d1);
   if($r1){
      echo 1;
   }else{
      echo 2;
   }
}
?>