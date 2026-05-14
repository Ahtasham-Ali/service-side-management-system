<?php
include('../connection.php');

// 1. Data Capture
$name       = mysqli_real_escape_string($conn, $_POST['name']);
$phone      = mysqli_real_escape_string($conn, $_POST['phone']);
$email      = mysqli_real_escape_string($conn, $_POST['email']);
$skill      = mysqli_real_escape_string($conn, $_POST['skill']);
$address      = mysqli_real_escape_string($conn, $_POST['address']);
$experience     = mysqli_real_escape_string($conn, $_POST['experience']);
$service_charges      = mysqli_real_escape_string($conn, $_POST['service_charges']);
$cnic      = mysqli_real_escape_string($conn, $_POST['cnic']);
// $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

// 2. Path Fix (Ye sabse zaroori hai)
// Hum __DIR__ use kar rahe hain jo file ki apni location batata hai
$target_dir = dirname(__DIR__, 2) . "/uploads/technicians/"; 

// Folder check aur creation
if (!is_dir($target_dir)) { 
    mkdir($target_dir, 0777, true); 
}

// 3. Profile Image Handling
$profile_name = "";
if (!empty($_FILES['profile_image']['name'])) {
    $profile_ext  = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
    $profile_name = "profile_" . time() . "_" . rand(1000, 9999) . "." . $profile_ext;
    
    // Yahan rasta check karein
    if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_name)) {
        echo "Error: Upload failed. Folder path: " . $target_dir;
        exit();
    }
}

// 4. Portfolio Images Handling
$portfolio_names = [];
if (!empty($_FILES['portfolio']['name'][0])) {
    foreach ($_FILES['portfolio']['name'] as $key => $val) {
        $file_tmp  = $_FILES['portfolio']['tmp_name'][$key];
        $file_ext  = pathinfo($_FILES['portfolio']['name'][$key], PATHINFO_EXTENSION);
        $new_name  = "port_" . time() . "_" . rand(1000, 9999) . "." . $file_ext;
        
        if (move_uploaded_file($file_tmp, $target_dir . $new_name)) {
            $portfolio_names[] = $new_name;
        }
    }
}
$portfolio_string = implode(",", $portfolio_names);

// 5. Database Insert
$sql = "INSERT INTO `technician` (`name`, `phone`, `email`, `skill`,`address`,`experience`,`service_charges`,`t_cnic`,`profile_image`, `portfolio_images`) 
        VALUES ('$name', '$phone', '$email', '$skill','$address','$experience','$service_charges','$cnic','$profile_name', '$portfolio_string')";

if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "DB Error: " . mysqli_error($conn);
}
?>