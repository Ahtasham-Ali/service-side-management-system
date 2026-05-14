<?php
include('../connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name            = mysqli_real_escape_string($conn, $_POST['name']);
    $phone           = mysqli_real_escape_string($conn, $_POST['phone']);
    $email           = mysqli_real_escape_string($conn, $_POST['email']);
    $skill           = mysqli_real_escape_string($conn, $_POST['skill']);
    $address         = mysqli_real_escape_string($conn, $_POST['address']);
    $experience      = mysqli_real_escape_string($conn, $_POST['experience']);
    $service_charges = mysqli_real_escape_string($conn, $_POST['service_charges']);
    $cnic            = mysqli_real_escape_string($conn, $_POST['cnic']);
    $created_at      = mysqli_real_escape_string($conn, $_POST['created_at']);

    $target_dir = "../../uploads/technicians/"; 
    if (!is_dir($target_dir)) { 
        mkdir($target_dir, 0777, true); 
    }

    // Profile Image
    $profile_name = "";
    if (!empty($_FILES['profile_image']['name'])) {
        $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $profile_name = "profile_" . time() . "_" . rand(1000, 9999) . "." . $ext;
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_name);
    }

    // Portfolio Multi-Images
    $portfolio_names = [];
    if (!empty($_FILES['portfolio']['name'][0])) {
        foreach ($_FILES['portfolio']['name'] as $key => $val) {
            $ext = pathinfo($val, PATHINFO_EXTENSION);
            $new_name = "port_" . time() . "_" . rand(1000, 9999) . "." . $ext;
            if (move_uploaded_file($_FILES['portfolio']['tmp_name'][$key], $target_dir . $new_name)) {
                $portfolio_names[] = $new_name;
            }
        }
    }
    $portfolio_string = implode(",", $portfolio_names);

    // Status is 'pending' by default
    $sql = "INSERT INTO `technician` 
            (`name`, `phone`, `email`, `skill`, `address`, `experience`, `service_charges`, `t_cnic`, `created_at`, `profile_image`, `portfolio_images`, `status`) 
            VALUES 
            ('$name', '$phone', '$email', '$skill', '$address', '$experience', '$service_charges', '$cnic', '$created_at', '$profile_name', '$portfolio_string', 'pending')";

    if (mysqli_query($conn, $sql)) {
        echo "1";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}
?>