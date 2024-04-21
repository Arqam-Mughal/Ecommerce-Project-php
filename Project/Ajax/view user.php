<?php
include("../connection.php");
                          $sql = "SELECT * FROM `user` u INNER JOIN `role` r ON u.rolename=r.roleid";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){
                                                          
                            ?>
                            <tr>
                        <td><?php echo $fet['uname']; ?></td>
                        <td><?php echo $fet['uemail']; ?></td>
                        <td><?php echo $fet['umobile']; ?></td>
                        <td><?php echo $fet['ucnic']; ?></td>
                        <td><?php echo $fet['upass']; ?></td>
                        <td><?php echo $fet['role']; ?></td>
                        <td><a href="./Update User.php?userid=<?php echo $fet['userid']; ?>" ><span data-feather="edit" data-toggle="tooltip" class="btn btn-success" title="Update">Update</span></a></td>
                        <td><button class="delete btn btn-danger" type="button" data-userid="<?php echo $fet['userid']; ?> ">Delete</button></td> 
                    </tr>
                            <?php
                          }
                          ?>