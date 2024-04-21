<?php
include("../connection.php");
                          $sql = "SELECT * FROM `orders`";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){
                            ?>
                            <tr>
                        <td><?php echo $fet['oid']; ?></td>
                        <td><?php echo $fet['order_num']; ?></td>
                        <td><?php echo $fet['proname']; ?></td>
                        <td><?php echo $fet['uemail']; ?></td>                       
                        <td><?php echo $fet['pquantity']; ?></td>                       
                        <td><?php echo $fet['ptprice']; ?></td>                       
                        <td><?php echo $fet['ostatus']; ?></td>                       
                        <td><?php echo $fet['odate']; ?></td>                       
                        <td><a href="./updateorder.php?oid=<?php echo $fet['oid']; ?>" class="btn btn-success">update</a></td>
                        <td><button class="delete btn btn-danger" type="button" data-oid ="<?php echo $fet['oid']; ?>" >delete</button></td>
                    </tr>
                            <?php
                          }
                    ?>
