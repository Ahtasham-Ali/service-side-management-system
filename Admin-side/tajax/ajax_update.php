<?php 
include('../connection.php');

$c_id = mysqli_real_escape_string($conn, $_POST['technician_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$skill = mysqli_real_escape_string($conn, $_POST['skill']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

if (empty($name) || empty($phone) || empty($email) || empty($skill) || empty($status) || empty($created_at)) {
    echo 2;
} 
else {

$sql = "UPDATE `technician` 
SET 
`name`='$name',
`phone`='$phone',
`email`='$email',
`skill`='$skill',
`status`='$status',
`created_at`='$created_at' 
WHERE `technician_id`='$c_id'";

$run = mysqli_query($conn, $sql);

if ($run) {
    echo 1;
} else {
    echo 0;
}

}
?>