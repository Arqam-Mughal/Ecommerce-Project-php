<?php
include "../connection.php";

$subid = mysqli_real_escape_string($connection,$_POST['subid']);


  $pid = mysqli_real_escape_string($connection,$_POST['spid']);
  $subname = mysqli_real_escape_string($connection,$_POST['subname']);
  $subdes = mysqli_real_escape_string($connection,$_POST['subdes']);
  $sql = "UPDATE `subcategary` SET `spid`='$pid',`subname`='$subname',`subdes`='$subdes' WHERE `subid` ='$subid'";

  $run = mysqli_query($connection, $sql);

  if ($run) {
    echo 1;
    // header("Refresh:0,url=./Viewsubcategary.php");
  } else {
    echo 1;
  }

?>