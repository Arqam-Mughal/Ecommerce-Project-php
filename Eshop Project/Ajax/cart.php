<?php
include ("../connection.php");

session_start();

$uemail = @$_SESSION['uemail'];



// if($_POST['pcode']!==""){
    if(isset($_POST['pcode'])){
if($uemail==""){
    echo 1;
}else{
     $productid = mysqli_real_escape_string($connection,$_POST['productid']);
     $pcode = mysqli_real_escape_string($connection,$_POST['pcode']);
     $proname = mysqli_real_escape_string($connection,$_POST['proname']);
     $psale = mysqli_real_escape_string($connection,$_POST['psale']);
     $ppic = mysqli_real_escape_string($connection,$_POST['ppic']);
     $ptprice = mysqli_real_escape_string($connection,$_POST['ptprice']);
     $uemail = mysqli_real_escape_string($connection,$_POST['uemail']);
     $quantity = 1;

    $sqli = "SELECT * FROM  `cart` WHERE `pcode` = '$pcode' AND `uemail` = '$uemail'";
    $ran = mysqli_query($connection,$sqli);
    $fat = mysqli_fetch_assoc($ran);
    if(mysqli_num_rows($ran)==1){
        echo 2;
    }else{
        $ins = "INSERT INTO `cart` (`productid`,`pcode`,`proname`,`psale`,`ppic`,`ptprice`,`uemail`,`quantity`)VALUES('$productid','$pcode','$proname','$psale','$ppic','$ptprice','$uemail','$quantity')";

        $rrun = mysqli_query($connection,$ins);
        if($rrun){
            echo 3;
        }else{
            echo 4;
        }
    }
}
}

if(isset($_POST['del'])){
    $del=$_POST['del'];
    
    $sql = "SELECT * FROM `cart` WHERE `productid` = '$del'";
    $run = mysqli_query($connection,$sql);
    $fet = mysqli_fetch_assoc($run);
     
    $pic = $fet['ppic'];
     if(file_exists("../Project/img/.$pic")){
        unlink("../Project/img/.$pic");
     }
     $sdel = "DELETE FROM `cart` WHERE `productid` = '$del'";
     $srun=mysqli_query($connection,$sdel);
     if($srun){
        echo 5;
     }else{
       echo 6;
     }
    
    }
if(isset($_POST['myempty'])){
    $emp = "DELETE FROM `cart` WHERE `uemail`='$uemail'";
    $erun = mysqli_query($connection,$emp);
    if($erun){
        echo 7;
    }else{
        echo 8;
    }
}

// if(isset($_POST['cartItem']) && $_POST['cartItem'] == 'cart_item'){
    // $sql2 = "SELECT COUNT(*) FROM `cart` WHERE `uemail`='$uemail'";
    // $res = mysqli_query($connection,$sql2);
    // // $resp = mysqli_num_rows($res);
    // $resp = mysqli_fetch_row($res);
    // $rowcount = $resp[0];
  
    // echo $rowcount;

// }
if(isset($_POST['cartItem'])){
    $count = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
    $res = mysqli_query($connection,$count);
    $c = mysqli_num_rows($res);
      
    if(!empty(@$uemail)){
        
        echo $c;
         }else{
             echo $c = 0;
         }

}

if(isset($_POST['cartpp'])){
    $sql3 = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
    $result = mysqli_query($connection,$sql3);
    $gtotal =0;
    while($row2 = mysqli_fetch_assoc($result)){
    $gtotal = $gtotal+$row2['ptprice'];
    }

    if(!empty(@$uemail)){    
   echo $gtotal;
    }else{
        echo $gtotal = 0;
    }
}  
if(isset($_POST['cqty'])){
    $cart_id = $_POST['mycartid'];
    $myprice = $_POST['myprice'];
    $cqty = $_POST['cqty'];
     
    $ptprice = $cqty*$myprice;

    $sqll = "UPDATE `cart` SET `ptprice`='$ptprice',`quantity`='$cqty' WHERE `productid`='$cart_id'";
    $rrrun = mysqli_query($connection,$sqll);
    if($rrrun){
        echo 9;
    }else{
        echo 10;
    }
} 

?>