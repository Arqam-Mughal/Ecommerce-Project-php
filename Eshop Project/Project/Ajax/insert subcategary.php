<?php
include("../connection.php");

    $pid = mysqli_real_escape_string($connection, $_POST['pid']);
    $subname = mysqli_real_escape_string($connection, $_POST['subname']);
    $subdes = mysqli_real_escape_string($connection, $_POST['subdes']);   
        $my = "INSERT INTO `subcategary`(`spid`,`subname`,`subdes`) VALUES ('$pid','$subname','$subdes')";
        $run = mysqli_query($connection, $my);
        if ($run) {
            echo 1;
            header("Refresh:0,url=../Viewsubcategary.php");
        } else {
            echo 2;
        }

?>