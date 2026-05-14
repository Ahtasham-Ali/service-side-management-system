<?php 
include('../connection.php');

$c_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
$updated_at = mysqli_real_escape_string($conn, $_POST['updated_at']);

if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($address) || empty($city) || empty($created_at) || empty($updated_at)) {
    echo 2;
} 
else {

$sql = "UPDATE `user` 
SET 
`name`='$name',
`email`='$email',
`phone`='$phone',
`password`='$password',
`address`='$address',
`city`='$city',
`created_at`='$created_at', 
`updated_at`='$updated_at'
WHERE `user_id`='$c_id'";

$run = mysqli_query($conn, $sql);

if ($run) {
    echo 1;
} else {
    echo 0;
}

}
?>