<?php
include "../connection.php";

$productid = mysqli_real_escape_string($connection,$_POST['productid']);
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
    $ppic = $_FILES['ppic']['name'];

    $p= array();
    if(!empty($ppic[0])){
    foreach ($ppic as $value) {
        $exe = strtolower(pathinfo($value,PATHINFO_EXTENSION));
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

      $sql = "UPDATE `product` SET `pcname` = '$pcname' , `psubname` = '$psubname', `psupname` ='$psupname',`pcode` = '$pcode',`proname`='$proname',`pdes`='$pdes',`pcost`=$pcost,`psale`='$psale',`pqname`='$pqname',`pstock`='$pstock',`status`='$status',`ppic`='$pi' WHERE `productid`='$productid' ";
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
      $msg = "IMG NOT RIGHT";
    }

  }else{
    
    $sql = "UPDATE `product` SET `pcname` = '$pcname' , `psubname` = '$psubname', `psupname` ='$psupname',`pcode` = '$pcode',`proname`='$proname',`pdes`='$pdes',`pcost`=$pcost,`psale`='$psale',`pqname`='$pqname',`pstock`='$pstock',`status`='$status' WHERE `productid`='$productid' ";
      $run = mysqli_query($connection,$sql);
      if($run){
        foreach ($p as $key => $d) {
          move_uploaded_file($_FILES['ppic']['tmp_name'][$key],"../img/".$d);
        }
        echo 1;
      }else{
        echo 2;
      }
  }

?>