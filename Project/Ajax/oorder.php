<?php
include("../connection.php");
session_start();
$uemail=$_SESSION['email'];
 $sql = "SELECT * FROM `orders`";
 $run = mysqli_query($connection,$sql);

 while($fet = mysqli_fetch_assoc($run)){
   ?>
   <div>
   <tr>
     <td><?php echo $fet['order_num']; ?></td>
     <td><?php echo $fet['proname']; ?></td>
     <td><?php echo $fet['psale']; ?></td>
     <td><?php echo $fet['uemail']; ?></td>
     <td align="center"><?php echo $fet['pquantity']; ?></td>
     <td><?php echo $fet['ptprice']; ?></td>
     <td><?php echo $fet['ostatus']; ?></td>
     <td><button class="delete btn btn-danger" type="button" data-order_num="<?php echo $fet['order_num']; ?> ">Delete</button></td> 
 </tr>
 </div>
   <?php
    }
 ?>