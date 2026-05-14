<?php
include('../connection.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Pehle images ke naam le kar aao takay folder se delete kar saken (Optional but good practice)
    $res = mysqli_query($conn, "SELECT profile_image, portfolio_images FROM `technician` WHERE technician_id = '$id'");
    $data = mysqli_fetch_assoc($res);

    // Delete from Database
    $delete = mysqli_query($conn, "DELETE FROM `technician` WHERE technician_id = '$id'");

    if($delete) {
        echo "1";
    } else {
        echo "0";
    }
}
?>