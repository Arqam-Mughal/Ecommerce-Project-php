<?php
include "../connection.php";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$role = $_POST['rolesid'];
$upass = md5($_POST['password']);
$cfmpass = md5($_POST['cfmpass']);

if($upass === $cfmpass){

$select =  "SELECT * FROM `admin` WHERE `rolesid` = '$role'";
$r = mysqli_query($connection, $select);
if(mysqli_num_rows($r) > 0){
  echo 3;
}else{

$insert = "INSERT INTO `admin` (`fname`,`lname`,`email`,`password`,`cfmpass`,`rolesid`)VALUES('$fname','$lname','$email','$upass','$cfmpass','$role')";
$run = mysqli_query($connection,$insert);
if($run){
  echo 1;
}else{
  echo 2;
}
}
}else{
  echo "Password Invalid!";
}
?>