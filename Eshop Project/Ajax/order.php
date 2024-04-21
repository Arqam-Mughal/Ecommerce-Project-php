<?php
include("../connection.php");
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

 require "../PHPMailer/PHPMailer.php";
 require "../PHPMailer/Exception.php";
 require "../PHPMailer/SMTP.php";
// $con = pfsockopen()
// echo "run";
session_start();
$uemail = $_SESSION['uemail'];
$sqql = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
$runc = mysqli_query($connection,$sqql);
$ggtotal = 0;
while($fetc = mysqli_fetch_assoc($runc)){
    $ggtotal = $ggtotal+$fetc['ptprice'];
}
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
$total = $ggtotal;

// if($ufname = "" || $ulname = "" || $uemail = "" || $umobile = "" || $ucountry = "" || $ustate = "" || $ucity = "" || $pstlcode = "" || $uaddress = "" || $uaddress = "" || $praddress = "" || $total = ""){
//     echo 1;
// }else{
    $ss = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
    $rr = mysqli_query($connection,$ss);
    if($rr){
    $osql = "INSERT INTO `onlineuser`(`fname`, `lname`, `email`, `mobile`, `country`, `state`, `city`, `postlcode`, `address`, `peraddress`, `total`) VALUES ('$ufname','$ulname','$uemail','$umobile','$ucountry','$ustate','$ucity','$pstlcode','$uaddress','$praddress','$total')";
    $orun = mysqli_query($connection,$osql);
    if($orun){
        $msg="Run";
    }else{
        echo "Query Not Run";
    }
}else{
   echo "Not Run"; 
}
if($msg=="Run"){
    $select_query = "SELECT * FROM `cart` WHERE `uemail`='$uemail'";
    $rrun = mysqli_query($connection,$select_query);
    while($fetch = mysqli_fetch_assoc($rrun)){
        
    $cartid = $fetch['productid'];
    $pcode = $fetch['pcode'];
    $proname = $fetch['proname'];
    $psale = $fetch['psale'];
    $ppic = $fetch['ppic'];
    $ptprice = $fetch['ptprice'];
    $uemail = $fetch['uemail'];
    $quantity = $fetch['quantity'];
$order_num = rand(10000,100000);

$ordersql = "INSERT INTO `orders` (`order_num`,`cartid`,`pcode`,`proname`,`psale`,`ppic`,`ptprice`,`uemail`,`pquantity`)VALUES('$order_num','$cartid','$pcode','$proname','$psale','$ppic','$ptprice','$uemail','$quantity')";
$orderrun = mysqli_query($connection,$ordersql);

if($orderrun){
    $msg="Insert";
}else{
    echo "Not Insert";
}
}
}

if($msg=="Insert"){
    $del_query = "DELETE FROM `cart` WHERE `uemail`='$uemail'";
    $drun = mysqli_query($connection,$del_query);
    if($drun){
       echo "Right";
    }else{
        $msg = "Not Right";
    }
}
if($msg=="Right"){
    $name = "Mirza Arqam";
        $order = rand(10000,90000);
        $oemail="$uemail";
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mirzaarqam88@gmail.com";
        $mail->Password = "sxdzttzonqgzrqap";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        $mail->isHTML(true);
        $mail->setFrom($oemail,$name);
        $mail->addAddress($oemail);
        $mail->Subject = "Male Fashion inventory Store Invoic ID";
        $mail->Body = "<h1>Your invoice ID is $order </h1> <p>Please use this invoice id to confirm your order when you receive your parcel from our courier service partner. <br> Thanks for shopping!</p>";
        
        if($mail->send()){
            echo "<h1>MSG HAS BEEN SEND </h1>";
        }else{
            echo "<h1>MSG HAS NOT BEEN SEND</h1>";
        }
}

// }

?> 