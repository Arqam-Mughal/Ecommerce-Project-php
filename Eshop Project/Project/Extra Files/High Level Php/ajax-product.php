<?php
include('../include/conn.php');
    $pc_id = mysqli_real_escape_string($conn, $_POST['pc_id']);
    $ps_id = mysqli_real_escape_string($conn, $_POST['ps_id']);
    $psu_id = mysqli_real_escape_string($conn, $_POST['psu_id']);
    $p_code = mysqli_real_escape_string($conn, $_POST['p_code']);
    $p_name = strtoupper(mysqli_real_escape_string($conn, $_POST['p_name']));
    $p_des = strtoupper(mysqli_real_escape_string($conn, $_POST['p_des']));
    $p_srp = mysqli_real_escape_string($conn, $_POST['p_srp']);
    $p_unit = mysqli_real_escape_string($conn, $_POST['p_unit']);
    $pq_id = mysqli_real_escape_string($conn, $_POST['pq_id']);
    $p_stock = mysqli_real_escape_string($conn, $_POST['p_stock']);
    $p_image = $_FILES['p_image']['name'];
    $p_radio = mysqli_real_escape_string($conn, $_POST['p_radio']);
    $p_date = date('Y-m-d');

    if ($pc_id == "" || $ps_id == "" || $psu_id == "" || $p_code == "" || $p_name == "" || $p_des == "" || $p_srp == "" || $p_unit == "" || $pq_id == "" || $p_stock == "" || $p_image == "" || $p_radio == "") {
        echo 1;
    } else {
        $dup = mysqli_query($conn, "SELECT * FROM `product` WHERE p_name='$p_name'  &&pc_id='$pc_id' &&ps_id='$ps_id' &&psu_id='$psu_id' &&pq_id='$pq_id'");
        if (mysqli_num_rows($dup) > 0) {
            echo 2;
        } else {
            $dup_1 = mysqli_query($conn, "SELECT * FROM `product` WHERE p_code='$p_code'");
            if (mysqli_num_rows($dup_1) > 0) {
                echo 3;
            } else {
                $exe = strtolower(pathinfo($p_image, PATHINFO_EXTENSION));
                $arr = array("png", "jpg", "jpeg");
                $name = rand(100000, 900000);
                $mypic = $name.".".$exe;
                if (in_array($exe, $arr)) {
                    $msg = "right";
                } else {
                    echo 4;
                }
                if (@$msg == "right") {
                    $sql = "INSERT INTO `product`( `pc_id`, `ps_id`, `psu_id`, `p_code`, `p_name`, `p_des`, `p_srp`, `p_unit`, `pq_id`, `p_stock`, `p_image`, `p_radio`, `p_date`) VALUES ('$pc_id','$ps_id','$psu_id','$p_code','$p_name','$p_des','$p_srp','$p_unit','$pq_id','$p_stock','$mypic','$p_radio','$p_date')";

                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                        move_uploaded_file($_FILES['p_image']['tmp_name'], "../g-image/".$mypic);
                        echo 5;
                    } else {
                        echo 6;
                    }
                }
            }
        }
    }
    ?>
