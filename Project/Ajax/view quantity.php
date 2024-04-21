<?php
include("../connection.php");
                          $sql = "SELECT * FROM `quantity`";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){
                            ?>
                            <tr>
                        <td><?php echo $fet['quaname']; ?></td>
                        <td><?php echo $fet['quades']; ?></td>
                        <td><a href="./UpdateQuantity.php?quaid=<?php echo $fet['quaid']; ?>" class="btn btn-success">update</a></td>
                        <td><button class="delete btn btn-danger" type="button" data-quaid="<?php echo $fet['quaid']; ?>" >delete</button></td>
                    </tr>
                            <?php
                          }
                          ?>