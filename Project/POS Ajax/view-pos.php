<?php
include("../connection.php");
     $psql = "SELECT * FROM `pos-cart`";

$prun = mysqli_query($connection,$psql);
$gtotal=0;
while($fet = mysqli_fetch_assoc($prun)){
  $gtotal = $gtotal + $fet['total'];
  ?>
  <tr align="center">
<td><?php echo $fet['code']; ?></td>
<td><?php echo $fet['name']; ?></td>
<td><?php echo $fet['total']; ?></td>
<td><?php echo $fet['stock']; ?></td>
<td>
<input type="text" style="width:40px !important;" class="qty text-center" name="pqname" id="pqname" readonly value="<?php echo $fet['qty']; ?>">
</td>
<td>
          <button class="dbtn btn btn-danger bg-deep-orange" type="button" data-del="<?php echo $fet['posid'] ; ?>" >Remove</button>
      </td>
</tr>

  <?php
}
?> 
<tr>
  <td colspan="6"><div class="container"><div class="row bg-light mt-3 pt-2">
  <div class="h4 col-8 text-danger"><b><i>Total :-</i></b></div>
                        <div class="h4 col-4 text-danger"><b class="targett"><?php echo $gtotal; ?></b></div></div></div>
                        </td>
</tr>
                                