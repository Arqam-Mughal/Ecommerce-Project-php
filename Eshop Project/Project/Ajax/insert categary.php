<?php
include("../connection.php");

// session_start();

// if(empty($_SESSION['email'])){
//   header("Location:../auth-login.php");
// }
    $pname = $_POST['pname'];
    $pmessage = $_POST['pmessage'];
    $s = "SELECT * FROM `project` WHERE `pname`='$pname'";
    $r = mysqli_query($connection,$s);
    if(mysqli_num_rows($r)>0){
      echo 3;
    }else{

    $sql = "INSERT INTO `project`(`pname`,`pmessage`) VALUES ('$pname','$pmessage')";
    $run = mysqli_query($connection,$sql);
    if($run){
        echo 1;
    //   header("Refresh:0,url=./Viewcategary.php");
    }else{
      echo 2;
    }
}


?>

