<?php
include("../connection.php");
                          $sql = "SELECT * FROM `onlineuser`";
                          $run = mysqli_query($connection,$sql);

                          while($fet = mysqli_fetch_assoc($run)){
                            ?>
                            <tr>
                        <td class="onum"><?php echo $fet['order_num']; ?></td>
                        <td><?php echo $fet['fname']; ?></td>
                        <td><?php echo $fet['country']; ?></td>                       
                        <td><?php echo $fet['mobile']; ?></td>                       
                        <td><?php echo $fet['address']; ?></td>                       
                        <td align="center"><input type="checkbox" class="onumb" data-onum ="<?php echo $fet['order_num']; ?>"></td>                       
                        <td><?php echo $fet['ustatus']; ?></td>  
                        <td><?php echo $fet['date']; ?></td>                 
                        <td><a href="./invoice2.php?order_num=<?php echo $fet['order_num']; ?>" class="btn btn-success">Invoice</a></td>
                        <td><button class="delete btn btn-danger" type="button" data-order_num ="<?php echo $fet['order_num']; ?>" >delete</button></td>
                    </tr>
                            <?php
                          }
                          ?>