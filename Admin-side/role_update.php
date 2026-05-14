<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');

// URL se ID lena
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM role WHERE role_id = '$id'");
    $row = mysqli_fetch_assoc($res);
    
    // Permissions ko array mein wapis convert karna
    $saved_permissions = @unserialize($row['role']);
    if(!is_array($saved_permissions)) { $saved_permissions = []; }
}
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h4>Update Role</h4>
      </div>
      <div class="card-body">
        <form id="updateRoleForm">
          <input type="hidden" name="role_id" value="<?php echo $row['role_id']; ?>">
          
          <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="role_name" class="form-control" value="<?php echo $row['role_name']; ?>" required>
          </div>

          <div class="mb-3">
            <label>Access Type</label>
            <select name="role_access" class="form-control" required>
              <option value="Full Access" <?php if($row['role_access'] == 'Full Access') echo 'selected'; ?>>Full Access</option>
              <option value="Limited Access" <?php if($row['role_access'] == 'Limited Access') echo 'selected'; ?>>Limited Access</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Permissions</label><br>
            <?php 
            // Ye wo list hai jo aapne insert ke waqt use ki hogi
            $all_perms = ['Dashboard', 'Users', 'Technicians', 'Orders', 'Roles', 'Settings'];
            foreach($all_perms as $p) {
                // Check karna ke kya ye permission saved array mein hai?
                $checked = in_array($p, $saved_permissions) ? "checked" : "";
                echo "
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='checkbox' name='role_permissions[]' value='$p' $checked>
                  <label class='form-check-label'>$p</label>
                </div>";
            }
            ?>
          </div>

          <button type="submit" class="btn btn-primary">Update Role</button>
          <a href="role_view.php" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#updateRoleForm").on("submit", function(e){
        e.preventDefault();
        
        $.ajax({
            url: "./roleajax/ajax_update.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                if(response == 1) {
                    alert("Role Updated Successfully!");
                    window.location.href = "role_view.php";
                } else {
                    alert("Error: " + response);
                }
            }
        });
    });
});
</script>

<?php include('./include/footer.php'); ?>