<?php
include('../connection.php');

		$sql="SELECT * FROM `admin`";
		$run=mysqli_query($conn,$sql);
		while($fet=mysqli_fetch_assoc($run)){
			?>
		<tr>
			<td><?php echo $fet['admin_id'] ?></td>
			<td><?php echo $fet['name'] ?></td>
			<td><?php echo $fet['email'] ?></td>
			<td><?php echo $fet['password'] ?></td>
			<td><?php echo $fet['role'] ?></td>
			<td><?php echo $fet['created_at'] ?></td>
			<td>
				<a href="./admin_update.php?upid=<?php echo $fet['admin_id'] ?>" class="btn btn-primary">Update</a>
			</td>
			<td>
                 <button id="btn-del" data-del="<?php echo $fet['admin_id']; ?>" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		<?php
		}
		?>



