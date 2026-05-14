<?php
include('../connection.php');
$c_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
$sql = "SELECT * FROM `admin` WHERE `admin_id`='$c_id'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

if (empty($name) || empty($email) || empty($password) || empty($role) || empty($created_at)) {
    echo 0;
} else {
    $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`role`='$role',`created_at`='$created_at' WHERE `admin_id`='$c_id'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo 1;
    } else {
        echo 2;
    }
}
?>