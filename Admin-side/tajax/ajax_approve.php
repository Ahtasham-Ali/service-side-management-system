<?php
include('../connection.php');

// Output buffering clean karein taake extra HTML na jaye
ob_clean(); 

if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Status update query
    $sql = "UPDATE `technician` SET `status` = 'approved' WHERE `technician_id` = '$id'";
    
    if(mysqli_query($conn, $sql)){
        // Sirf '1' echo karna hai, aur kuch nahi
        echo "1"; 
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    echo "ID not found";
}
exit; // Code yahin khatam karein
?>