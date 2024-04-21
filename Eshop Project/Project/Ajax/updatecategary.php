<?php
include("../connection.php");

$pid = mysqli_real_escape_string($connection, $_POST['pid']);

$up = "SELECT * FROM `project` WHERE `pid`='$pid'";
$urun = mysqli_query($connection,$up);
$ufet = mysqli_fetch_assoc($urun);

    $pname = $_POST['pname'];
    $pmessage = $_POST['pmessage'];

    $sql = "UPDATE `project` SET `pname`='$pname',`pmessage`='$pmessage' WHERE pid ='$pid'";
            
    $run = mysqli_query($connection,$sql);

    if($run){
      echo 1;
        // header("Refresh:0,url=./Viewcategary.php");
    }else{
      echo 2;
    }


?>