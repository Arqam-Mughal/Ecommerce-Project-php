<?php
include("../connection.php");

session_start();

$uemail = @$_SESSION['uemail'];



// if($_POST['pcode']!==""){
    if(isset($_POST['pcode'])){
if($uemail==""){
    echo 1;
}else{
     $pad = mysqli_real_escape_string($conn,$_POST['pad']);
     $pcode = mysqli_real_escape_string($conn,$_POST['pcode']);
     $ppname = mysqli_real_escape_string($conn,$_POST['ppname']);
     $psale = mysqli_real_escape_string($conn,$_POST['psale']);
     $pppic = mysqli_real_escape_string($conn,$_POST['pppic']);
     $ptprice = mysqli_real_escape_string($conn,$_POST['ptprice']);
     $uemail = mysqli_real_escape_string($conn,$_POST['uemail']);
     $quantity = 1;

    $sqli = "SELECT * FROM  `cart` WHERE `pcode` = '$pcode' AND `uemail` = '$uemail'";
    $ran = mysqli_query($conn,$sqli);
    $fat = mysqli_fetch_assoc($ran);
    if(mysqli_num_rows($ran)==1){
        echo 2;
    }else{
        $ins = "INSERT INTO `cart`(`pad`,`pcode`,`ppname`,`psale`,`pppic`,`ptprice`,`uemail`,`quantity`)VALUES('$pad','$pcode','$ppname','$psale','$pppic','$ptprice','$uemail','$quantity')";

        $rrun = mysqli_query($conn,$ins);
        if($rrun){
            echo 3;
        }else{
            echo 4;
        }
    }
}
}
                    // Ignore 
if(isset($_POST['del'])){
    $del=$_POST['del'];
    
    $sql = "SELECT * FROM `cart` WHERE `pad` = '$del'";
    $run = mysqli_query($conn,$sql);
    $fet = mysqli_fetch_assoc($run);
     
    $pic = $fet['pppic'];
     if(file_exists("../Admin/img/.$pic")){
        unlink("../Admin/img/.$pic");
     }
     $sdel = "DELETE FROM `cart` WHERE `pad` = '$del'";
     $srun=mysqli_query($conn,$sdel);
     if($srun){
        echo 5;
     }else{
       echo 6;
     }
    
    }
if(isset($_POST['myempty'])){
    $emp = "DELETE FROM `cart` WHERE `uemail`='$uemail'";
    $erun = mysqli_query($conn,$emp);
    if($erun){
        echo 7;
    }else{
        echo 8;
    }
}

if(isset($_POST['cartItem']) && $_POST['cartItem'] == 'cart_item'){
    $sql2 = "SELECT COUNT(*) FROM `cart` WHERE `uemail`='$uemail'";
    $res = mysqli_query($conn,$sql2);
    // $resp = mysqli_num_rows($res);
    $resp = mysqli_fetch_row($res);
    $rowcount = $resp[0];
    
    echo $rowcount;

}
if(isset($_POST['cartpp']) == 'tprice'){
    $sql3 = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
    $result = mysqli_query($conn,$sql3);
    $gtotal =0;
    while($row2 = mysqli_fetch_assoc($result)){
    $gtotal = $gtotal+$row2['ptprice'];
    } 
    
   echo $gtotal;
}   
if(isset($_POST["cqty"])){
    $cart_id = $_POST[`mycartid`];
    $myprice =$_POST[`myprice`];
    $cqty = $_POST[`cqty`];
    $ptprice = $cqty*$myprice;
    $sql1 = "UPDATE `cart` SET `ptprice` =`$ptprice`,`quantity`=`$cqty`WHERE `pad`=`$cart_id`";
    $rrrun = mysqli_query($conn,$sql1);
    if($rrrun){
        echo 9;
    }else{
        echo 10;
    }

        
}

?>