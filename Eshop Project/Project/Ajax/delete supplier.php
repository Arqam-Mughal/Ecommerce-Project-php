<?php
include("../connection.php");

$del = $_POST['del'];

// $sql = "SELECT * FROM `project` WHERE `pid`='$del'";
// $run = mysqli_query($connection,$sql);
// $fet = mysqli_fetch_assoc($run);

// $pic = $fet['spic'];
// if(!empty($pic)){
//     unlink("./img/".$pic);
// }

$sdel = "DELETE FROM `supplier` WHERE `supid`='$del'";
$srun = mysqli_query($connection,$sdel);
if($srun){
    echo 1;
    header("Refresh:0,url=./ViewSupplier.php");
}else{
    echo 2;
}
?>