<?php
include("../connection.php");
                          $sql = "SELECT * FROM `role`";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){

                            $uns = unserialize($fet['accessto']);
                                                          
                            ?>
                            <tr>
                        <td><?php echo $fet['role']; ?></td>
                        <td><?php echo $fet['Access']; ?></td>
                        <td><?php echo implode(',' ,$uns); ?></td>                       
                        <td><a href="./Update role.php?roleid=<?php echo $fet['roleid']; ?>" ><span data-feather="edit" data-toggle="tooltip" class="btn btn-success" title="Update">Update</span></a></td>
                        <td><button class="delete btn btn-danger" type="button" data-roleid="<?php echo $fet['roleid']; ?> ">Delete</button></td> 
                    </tr>
                            <?php
                          }
                          ?>