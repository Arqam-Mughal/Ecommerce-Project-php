<?php
include("../connection.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

 require "../PHPMailer/PHPMailer.php";
 require "../PHPMailer/Exception.php";
 require "../PHPMailer/SMTP.php";
// $uemail = $_SESSION['uemail'];
   
?>
<?php

$ufname = mysqli_real_escape_string($connection,$_POST['ufname']);
$ulname = mysqli_real_escape_string($connection,$_POST['ulname']);
$uemail = mysqli_real_escape_string($connection,$_POST['uemail']);
$umobile = mysqli_real_escape_string($connection,$_POST['umobile']);
$ucountry = mysqli_real_escape_string($connection,$_POST['ucountry']);
$ustate = mysqli_real_escape_string($connection,$_POST['ustate']);
$ucity = mysqli_real_escape_string($connection,$_POST['ucity']);
$pstlcode = mysqli_real_escape_string($connection,$_POST['pstlcode']);
$uaddress = mysqli_real_escape_string($connection,$_POST['uaddress']);
$praddress = mysqli_real_escape_string($connection,$_POST['praddress']);
@$method = mysqli_real_escape_string($connection,$_POST['pay']);
$ustatus = "pending";
$date = date('m-d-y');
$order_num= rand(10000,90000);

if($ufname == "" || $ulname == "" || $uemail == ""|| $umobile == ""|| $ucountry == ""|| $ustate == ""|| $ucity == ""|| $pstlcode == ""|| $uaddress == ""|| $praddress == ""|| $method == ""|| $ustatus == ""|| $date == ""){
    echo 1;
}else{
    $sql = "INSERT INTO `onlineuser`(`fname`, `lname`, `email`, `mobile`, `country`, `state`, `city`, `postlcode`, `address`, `peraddress`, `pay`,`order_num`,`ustatus`,`date`) VALUES ('$ufname','$ulname','$uemail','$umobile','$ucountry','$ustate','$ucity','$pstlcode','$uaddress','$praddress','$method','$order_num','$ustatus','$date')";
    $run = mysqli_query($connection,$sql);
    if($run){
        $msg = "Right";
    }else{
       $msg = "Not Right";
    }

    if($msg =="Right"){
        $ssql = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
        $rrun = mysqli_query($connection,$ssql);
        $ggtotal=0;
        while($fet= mysqli_fetch_assoc($rrun)){
            $ggtotal=$ggtotal+$fet['ptprice'];
            $proname = $fet['proname'];
            $status = "pending";
            $ppic = $fet['ppic'];
            $psale = $fet['psale'];
            $ptprice = $fet['ptprice'];
            $uemail = $fet['uemail'];
            $quantity = $fet['quantity'];
            $odate = date('m-d-y');

        $slq = "INSERT INTO `orders`(`order_num`, `proname`,`psale`, `ptprice`, `uemail`, `pquantity`, `odate`, `ostatus`) VALUES ('$order_num','$proname','$psale','$ptprice','$uemail','$quantity','$odate','$status')";
        $unr = mysqli_query($connection,$slq);
        if($unr){
            $msg = "right";
        }else{
            echo "Not Right";
        }
    }

        }
}
     if(@$msg=="right"){
        $dell = "DELETE FROM `cart` WHERE `uemail`='$uemail'";
        $drun = mysqli_query($connection,$dell);
        if($drun){
            $msg="run";
        }else{
            $msg="not run";
        }
    if($msg=="run"){
        $name = "Mirza Arqam";
        $order = rand(10000,90000);
        $oemail="$uemail";
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mirzaarqam88@gmail.com";
        $mail->Password = "tqwa tejx lmkp qqva";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        $mail->isHTML(true);
        $mail->setFrom($oemail,$name);
        $mail->addAddress($oemail);
        $mail->Subject = "Male Fashion inventory Store Invoic ID";
        $mail->Body = "<h1>Your invoice ID is $order </h1> <p>Please use this invoice id to confirm your order when you receive your parcel from our courier service partner.Total Price Is : <b style='color: yellow;'>$ggtotal</b> <br> Thanks for shopping!</p> <img src='./images/1.2_3.jpg'>";
        
        if($mail->send()){
            echo 2;
        }else{
            echo 3;
        }
    }
    }


?>