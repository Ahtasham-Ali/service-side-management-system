<?php
include('../connection.php');

		$sql="SELECT * FROM `category`";
		$run=mysqli_query($conn,$sql);
		while($fet=mysqli_fetch_assoc($run)){
			?>
		<tr>
			<td><?php echo $fet['category_id'] ?></td>
			<td><?php echo $fet['name'] ?></td>
			<td><?php echo $fet['description'] ?></td>
			<td><?php echo $fet['status'] ?></td>
			<td><?php echo $fet['created_at'] ?></td>
			<td>
					<a href="./category_update.php?upid=<?php echo $fet['category_id'] ?>" class="btn btn-primary">Update</a>
			</td>
			<td>
			 <button id="btn-del" data-del="<?php echo $fet['category_id']; ?>" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		<?php
		}
		?>
