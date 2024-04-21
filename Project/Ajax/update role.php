<?php
include "../connection.php";
// include "../update role.php";

$get = $_POST['roleid'];

$ins = $_POST['rname'];
$access = $_POST['Access'];
// print_r($arr = $_POST['setting']);
if($access == "Custom"){
  
$arr = $_POST['setting'];
$arr1 = serialize($arr);

$update1 = "UPDATE `role` SET `role`='$ins',`Access`='$access',`accessto`='$arr1' WHERE `roleid`='$get'";
$run = mysqli_query($connection,$update1);
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

$update = "UPDATE `role` SET `role`='$ins',`Access`='$access',`accessto`='$arr2' WHERE `roleid`='$get'";
$runn = mysqli_query($connection,$update);
if($runn){
  echo 1;
}else{
  echo 2;
}
}

?>