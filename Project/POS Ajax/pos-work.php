<?php
include("../connection.php");
session_start();

$email = $_SESSION['email'];

if(isset($_POST['pos-uname'])){
    $name = mysqli_real_escape_string($connection,$_POST['pos-uname']);
    $phone = mysqli_real_escape_string($connection,$_POST['pos-uphone']);
    $tcash = mysqli_real_escape_string($connection,$_POST['tcash']);
    $ustatus = mysqli_real_escape_string($connection,$_POST['pos-ustatus']);
    $invoice = mysqli_real_escape_string($connection,$_POST['pos-uinvoice']);
    $udate = date('m-d-y');

    if($tcash<0){
        echo 1;
    }else{
        if($name=="" || $phone=="" || $ustatus=="" || $invoice==""){
            echo 2;
        }else{
        $ssql = "SELECT * FROM `pos-userinfo` WHERE `pos-uinvoice`='$invoice'";
        $rrun = mysqli_query($connection,$ssql);
        if(mysqli_num_rows($rrun)>0){
           echo 3;
        }else{

            $sql = "INSERT INTO `pos-userinfo`(`pos-uname`, `pos-uphone`, `tcash`, `pos-ustatus`, `pos-uinvoice`, `pos-email`,`pos-date`) VALUES ('$name','$phone','$tcash','$ustatus','$invoice','$email','$udate')";
            $run = mysqli_query($connection,$sql);
            if($run){
                $msg ="Right";
            }else{
                $msg ="Not Right";
            }
            
        }
        
    }
}

    }
    if(@$msg=="Right"){
        $sselect = "SELECT * FROM `pos-cart` WHERE `email`='$email'";
        $ccrun = mysqli_query($connection,$sselect);
        while($cfet = mysqli_fetch_assoc($ccrun)){
            $pcode = $cfet['code'];
            $pname = $cfet['name'];
            $sprice = $cfet['price'];
            $tprice = $cfet['total'];
            $pstock = $cfet['stock'];
            $pqty = $cfet['qty'];
            $udate = date('m-d-y');
            $status = "pending";
            $osql = "INSERT INTO `pos-orderinfo`(`pos-pname`, `pos-pcode`,`pos-sprice`,`pos-pqty`, `pos-pprice`, `pos-pinvoice`, `pos-pstatus`, `pos-pdate`)VALUES('$pname','$pcode','$sprice','$pqty','$tprice','$invoice','$status','$udate')";
            $orun = mysqli_query($connection,$osql);
            if($orun){
                $msg2 ="correct";                
            }else{
                $msg2="not";
            }
    
        }
    }
    if(@$msg2=="correct"){
        $del = "DELETE FROM `pos-cart` WHERE `email`='$email'";
        $drun = mysqli_query($connection,$del);
        if($drun){
            echo 4;
        }else{
            echo 5;
        }
    }

?>