<?php
include('../connection.php');

if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "DELETE FROM role WHERE role_id = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        echo mysqli_error($conn); // Error
    }
}
?>