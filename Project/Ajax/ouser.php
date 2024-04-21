<?php
include("../connection.php");
session_start();
$uemail=$_SESSION['email'];
 $sql = "SELECT * FROM `onlineuser`";
 $run = mysqli_query($connection,$sql);

 while($fet = mysqli_fetch_assoc($run)){
   ?>
   <tr>
     <td><?php echo $fet['order_num']; ?></td>
     <td><?php echo $fet['fname']; ?></td>
     <td><?php echo $fet['email']; ?></td>
     <td><?php echo $fet['mobile']; ?></td>
     <td><?php echo $fet['country']; ?></td>
     <td><?php echo $fet['address']; ?></td>
     <td align="center">
      <?php
      if($fet['ustatus']=="complete"){
        ?>
      <input type="checkbox"  name="" class="check" data-check="<?php echo $fet['order_num']; ?> " checked>
      <?php
    }else{
      ?>
      <input type="checkbox"  name="" class="check" data-check="<?php echo $fet['order_num']; ?>">
      <?php
    }
      ?>
      </td>
     <td><?php echo $fet['ustatus']; ?>
    </td>
    
     <td><a href="./invoice2.php?onum=<?php echo $fet['order_num']; ?>" class="btn btn-success">Invoice</a></td>
     <td><button class="delete btn btn-danger" type="button" data-order_num="<?php echo $fet['order_num']; ?> ">Delete</button></td> 
 </tr>
   <?php
    }
 ?>