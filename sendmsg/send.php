<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require "./PHPMailer/PHPMailer.php";
        require "./PHPMailer/Exception.php";
        require "./PHPMailer/SMTP.php";

        $name = "Mirza Arqam";
        $order = rand(10000,90000);
        $oemail="waqas.ishaq963@gmail.com";
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
?>