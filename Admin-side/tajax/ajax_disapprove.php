<?php
include('../connection.php');

ob_clean(); 

if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Status ko wapis pending kar dein
    $sql = "UPDATE `technician` SET `status` = 'pending' WHERE `technician_id` = '$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "1"; 
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    echo "ID not found";
}
exit;
?>