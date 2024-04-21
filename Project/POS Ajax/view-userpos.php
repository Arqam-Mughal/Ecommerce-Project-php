<?php
include("../connection.php");
session_start();
$uemail=$_SESSION['email'];
 $sql = "SELECT * FROM `pos-userinfo`";
 $run = mysqli_query($connection,$sql);

 while($fet = mysqli_fetch_assoc($run)){
   ?>
   <tr>
     <td><?php echo $fet['posuserid']; ?></td>
     <td><?php echo $fet['pos-uname']; ?></td>
     <td><?php echo $fet['pos-uphone']; ?></td>
     <td><?php echo $fet['tcash']; ?></td>
     <td><?php echo $fet['pos-email']; ?></td>
     <td align="center">
      <?php 
      if($fet['pos-ustatus']=="complete"){
      ?>
      <input type="checkbox"  name="" class="check" data-check="<?php echo $fet['pos-uinvoice']; ?> " checked>
      <?php
    }else{
      ?>
      <input type="checkbox"  name="" class="check" data-check="<?php echo $fet['pos-uinvoice']; ?> ">
      <?php
    }
    ?>
      </td>
      
     <td><?php echo $fet['pos-ustatus']; ?></td>
    
     <td><a href="./pos-invoice.php?onum=<?php echo $fet['pos-uinvoice']; ?>" class="btn btn-success bg-cyan">Invoice</a></td>
     <td><button class="delete btn btn-danger" type="button" data-del="<?php echo $fet['pos-uinvoice']; ?> ">Delete</button></td> 
 </tr>
   <?php
    }
 ?>