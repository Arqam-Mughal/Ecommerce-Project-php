<?php
include("../connection.php");

    $quaname = $_POST['quaname'];
    $quades = $_POST['quades'];

    $sql = "INSERT INTO `quantity`(`quaname`, `quades`) VALUES ('$quaname','$quades')";
    $run = mysqli_query($connection,$sql);
    if($run){
      echo 1;
    }else{
        echo 2;
    }

?>