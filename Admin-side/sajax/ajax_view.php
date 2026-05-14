<?php
include('../connection.php');

$sql="SELECT * FROM `service` s INNER JOIN `category` c ON s.category_name=c.category_id";
$run=mysqli_query($conn,$sql);
while($fet = mysqli_fetch_assoc($run)){
    ?>
<tr>
    <td><?php echo $fet['service_id'] ?></td>
    <td><?php echo $fet['name'] ?></td>
    <td><?php echo $fet['s_name'] ?></td>
    <td><?php echo $fet['s_description'] ?></td>
    <td><?php echo $fet['s_price'] ?></td>
    <td><?php echo $fet['s_duration'] ?></td>
  

    	<td>
				<a href="./s_update.php?upid=<?php echo $fet['service_id'] ?>" class="btn btn-primary">Update</a>
			</td>
            <td>
                <button id="btn-del" data-del="<?php echo $fet['service_id'] ?>" class="btn btn-danger">Delete</button>
            </td>
</tr>
<?php
}
?>