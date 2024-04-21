<?php
include "../connection.php";

$ins = $_POST['rname'];
$access = $_POST['Access'];
// print_r($arr = $_POST['setting']);
if($access == "Custom"){
  
$arr = $_POST['setting'];
$arr1 = serialize($arr);

$insert = "INSERT INTO `role`(`role`, `Access`, `accessto`) VALUES ('$ins','$access','$arr1')";
$run = mysqli_query($connection,$insert);
if($run){
  echo 1;
}else{
  echo 2;
}
}

// print_r($arrr = $_POST['Assess']);
if($access == "All"){
  $arrr = $_POST['Assess'];
$arr2 = serialize($arrr);

$insert = "INSERT INTO `role` (`role`,`Access`,`accessto`)VALUES('$ins','$access','$arr2')";
$runn = mysqli_query($connection,$insert);
if($runn){
  echo 1;
}else{
  echo 2;
}
}

?>