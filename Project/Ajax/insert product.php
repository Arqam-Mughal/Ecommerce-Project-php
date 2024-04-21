<?php
include("../connection.php");

    $pcname = mysqli_real_escape_string($connection,$_POST['pcname']);
    $psubname = mysqli_real_escape_string($connection,$_POST['psubname']);
    $psupname = mysqli_real_escape_string($connection,$_POST['psupname']);
    $pcode = mysqli_real_escape_string($connection,$_POST['pcode']);
    $proname = mysqli_real_escape_string($connection,$_POST['proname']);
    $pdes = mysqli_real_escape_string($connection,$_POST['pdes']);
    $pcost = mysqli_real_escape_string($connection,$_POST['pcost']);
    $psale = mysqli_real_escape_string($connection,$_POST['psale']);
    $pqname = mysqli_real_escape_string($connection,$_POST['pqname']);
    $pstock = mysqli_real_escape_string($connection,$_POST['pstock']);
    $status = mysqli_real_escape_string($connection,$_POST['status']);

    // $s = "SELECT * FROM `product` WHERE `pcname`= '$pcname'";
    // $r = mysqli_query($connection,$s);
    // if(mysqli_num_rows($r)>0){
    //   echo "<script>alert ('Categary Already exists') </script>";
    // }

    $ppic = $_FILES['ppic']['name'];

    $p= array();
    foreach ($ppic as $value) {
        $exe = pathinfo($value,PATHINFO_EXTENSION);
        // print_r($exe);
        $arr = array("jpg","jpeg","png","jfif");
        if(in_array($exe,$arr)){
          $p[] = rand(10000,100000).".".$exe;
            $msg = "Right";
        }else{
            $msg = "Img Not Right";
        }
    }

    if($msg=="Right"){
      $pi = serialize($p);

      $sql = "INSERT INTO `product`(`pcname`,`psubname`,`psupname`,`pcode`,`proname`,`pdes`,`pcost`,`psale`,`pqname`,`pstock`,`status`,`ppic`)VALUES('$pcname','$psubname',
      '$psupname','$pcode','$proname','$pdes','$pcost','$psale','$pqname','$pstock','$status','$pi')";

      $run = mysqli_query($connection,$sql);
      if($run){
        foreach ($p as $key => $d) {
          move_uploaded_file($_FILES['ppic']['tmp_name'][$key],"../img/".$d);
        }
        echo 1;
      }else{
        echo 2;
      }
    }else{
      echo 3;
    }
?>