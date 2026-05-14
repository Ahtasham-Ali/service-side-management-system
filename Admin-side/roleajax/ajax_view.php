<?php
include('../connection.php');

$sql = "SELECT * FROM role ORDER BY role_id ASC";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $permissions = @unserialize($row['role']); 
        $perm = (!empty($permissions) && is_array($permissions)) ? implode(", ", $permissions) : "All Access";
?>
        <tr>
            <td><?php echo $row['role_id']; ?></td>
            <td><?php echo ucfirst($row['role_name']); ?></td>
            <td><?php echo $row['role_access']; ?></td>
            <td><?php echo $perm; ?></td>
            <td>
                <a href="role_update.php?id=<?php echo $row['role_id']; ?>" class="btn btn-info btn-sm text-white">
                    <i class="fas fa-edit"></i> Edit
                </a>
                
                <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['role_id']; ?>">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No Roles Found</td></tr>";
}
?>