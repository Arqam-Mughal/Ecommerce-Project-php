<?php
include("../connection.php");

$sql = "SELECT * FROM `subcategary` s INNER JOIN `project` p ON s.spid=p.pid";
$run = mysqli_query($connection,$sql);

while($fet = mysqli_fetch_assoc($run)){
  ?>
  <tr>
<td><?php echo $fet['pname']; ?></td>
<td><?php echo $fet['subname']; ?></td>
<td><?php echo $fet['subdes']; ?></td>
<td><a href="./Updatesubcategary.php?subid=<?php echo $fet['subid']; ?>" class="btn btn-success">update</a></td>
<td><button type="button" class="delete btn btn-danger" data-subid="<?php echo $fet['subid']; ?>">delete</button></td>
</tr>
  <?php
}
?>