<?php
include("../connection.php");
 $sql = "SELECT * FROM `project`";
 $run = mysqli_query($connection,$sql);

 while($fet = mysqli_fetch_assoc($run)){
   ?>
   <tr>
     <td><?php echo $fet['pname']; ?></td>
     <td><?php echo $fet['pmessage']; ?></td>
    
     <td><a href="./Updatecategary.php?pid=<?php echo $fet['pid'] ?>" class="btn btn-primary">Update</a></td>
     <td><button class="delete btn btn-danger" type="button" data-pid="<?php echo $fet['pid']; ?> ">Delete</button></td> 
 </tr>
   <?php
    }
 ?>