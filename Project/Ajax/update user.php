<?php
include "../connection.php";

$uid = $_POST['userid'];
$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$umobile = $_POST['umobile'];
$ucnic = $_POST['ucnic'];
$upass = $_POST['upass'];
$cfmpass = $_POST['cfmpass'];
$rolename = $_POST['rolename'];

if($upass == $cfmpass){
$upd = "UPDATE `user` SET `uname`='$uname',`uemail`='$uemail',`umobile`='$umobile',`ucnic`='$ucnic',`upass`='$upass',`cfmpass`='$cfmpass',`rolename`='$rolename' WHERE `userid`='$uid'";
$run = mysqli_query($connection,$upd);
if($run){
  echo 1;
}else{
  echo 2;
}
}else{
  echo "Password Invalid!";
}
?>