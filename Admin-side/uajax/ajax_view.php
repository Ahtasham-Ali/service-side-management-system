      <?php
include('../connection.php');
		$sql="SELECT * FROM `user`";
		$run=mysqli_query($conn,$sql);
		while($fet=mysqli_fetch_assoc($run)){
			?>
		<tr>
			<td><?php echo $fet['user_id'] ?></td>
			<td><?php echo $fet['user_name'] ?></td>
			<td><?php echo $fet['email'] ?></td>
            <td><?php echo $fet['phone'] ?></td>
			<td><?php echo $fet['password'] ?></td>
			<td><?php echo $fet['address'] ?></td>
            <td><?php echo $fet['city'] ?></td>
			<td><?php echo $fet['created_at'] ?></td>
            <td><?php echo $fet['updated_at'] ?></td>
            	<td>
				<a href="./user_update.php?upid=<?php echo $fet['user_id'] ?>" class="btn btn-primary">Update</a>
			</td>
            <td>
                <button id="btn-del" data-del="<?php echo $fet['user_id'] ?>" class="btn btn-danger">Delete</button>
            </td>
		</tr>
		<?php
		}
		?>
