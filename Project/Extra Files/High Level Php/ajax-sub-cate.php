<?php
include('../include/conn.php');
    $sc_id = mysqli_real_escape_string($conn, $_POST['sc_id']);
    $scname = strtoupper(mysqli_real_escape_string($conn, $_POST['scname']));
    $s_cdate = date('Y-m-d');

    if ($sc_id == "" || $scname == "") {
        echo 1;
    } else {
        
        $dup = mysqli_query($conn, "SELECT * FROM `sub-cate` WHERE sc_id='$sc_id' &&scname='$scname'");
        if (mysqli_num_rows($dup) > 0) {
            echo 2;
        } else {
            $sql = "INSERT INTO `sub-cate`(`sc_id`,`scname`,`s_cdate`) VALUES ('$sc_id','$scname','$s_cdate')";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                echo 3;
            } else {
                echo 4;
            }
        }
    }

?>