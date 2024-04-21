<?php
include("../connection.php");
                          $sql = "SELECT * FROM `supplier`";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){
                            ?>
                            <tr>
                        <td><?php echo $fet['supname']; ?></td>
                        <td><?php echo $fet['supdes']; ?></td>
                        <td><?php echo $fet['supnum']; ?></td>                       
                        <td><a href="./UpdateSupplier.php?supid=<?php echo $fet['supid']; ?>" class="btn btn-success">update</a></td>
                        <td><button class="delete btn btn-danger" type="button" data-supid ="<?php echo $fet['supid']; ?>" >delete</button></td>
                    </tr>
                            <?php
                          }
                          ?>