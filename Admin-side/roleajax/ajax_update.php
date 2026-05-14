<?php
include('../connection.php');

if(isset($_POST['role_id'])) {
    $role_id = mysqli_real_escape_string($conn, $_POST['role_id']);
    $role_name = mysqli_real_escape_string($conn, $_POST['role_name']);
    $role_access = mysqli_real_escape_string($conn, $_POST['role_access']);
    
    // Checkboxes ka data array mein hota hai, usay serialize karna
    if(isset($_POST['role_permissions'])) {
        $permissions = serialize($_POST['role_permissions']);
    } else {
        $permissions = serialize([]); // Khali array agar kuch select na ho
    }

    $sql = "UPDATE `role` SET 
            `role_name` = '$role_name', 
            `role_access` = '$role_access', 
            `role` = '$permissions' 
            WHERE `role_id` = '$role_id'";

    if(mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}
?>