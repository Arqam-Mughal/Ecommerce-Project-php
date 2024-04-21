<?php
include("../connection.php");


$pid = mysqli_real_escape_string($connection, $_POST['pid']);


    $pname = mysqli_real_escape_string($connection,$_POST['pname']);
    $pmessage = mysqli_real_escape_string($connection,$_POST['pmessage']);

    $sql = "UPDATE `project` SET `pname`='$pname',`pmessage`='$pmessage' WHERE pid ='$pid'";
            
    $run = mysqli_query($connection,$sql);


    if($run){
      echo 1;
        // header("Refresh:0,url=./Viewcategary.php");
    }else{
      echo 2;
    }


?>