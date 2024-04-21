<?php
include("../connection.php");

                          $psql = "SELECT * FROM `product` p INNER JOIN `project` pro ON p.pcname=pro.pid INNER JOIN `subcategary` sub ON p.psubname=sub.subid INNER JOIN `supplier` sup ON p.psupname=sup.supid INNER JOIN `quantity` qua ON p.pqname=qua.quaid ";

                          $prun = mysqli_query($connection,$psql);

                          while($fet = mysqli_fetch_assoc($prun)){
                            ?>
                            <tr>
                        <td><?php echo $fet['proname']; ?></td>
                        <td><?php echo $fet['subname']; ?></td>
                        <td><?php echo $fet['supname']; ?></td>
                        <td><?php echo $fet['pcode']?></td>
                        <td><?php echo $fet['pname']?></td>
                        <td><?php echo $fet['pdes']?></td>
                        <td><?php echo $fet['pcost']?></td>
                        <td><?php echo $fet['psale']?></td>
                        <td><?php echo $fet['pqname']?></td>
                        <td><?php echo $fet['pstock']?></td>
                       
                       <td>
                                    <?php
                                        $pi = unserialize($fet['ppic']);
                                        foreach ($pi as $p) {
                                    ?>
                                    <img src="<?php echo "./img/".$p ; ?>" alt="Not Found" width="70" height="70">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $fet['status']?></td>
                                <td>
                                    <a href="./Updateproduct.php?productid=<?php echo $fet['productid']; ?>" ><span data-feather="edit" data-toggle="tooltip" class="btn btn-success" title="Update">Update</span></a></td>
                                    <td>
                                    <button class="delete btn btn-danger" type="button" data-productid="<?php echo $fet['productid'] ; ?>" >Delete</button>
                                </td>
                    </tr>
                            <?php
                          }
                          ?>