<?php 
include('../connection.php');

$service_id = mysqli_real_escape_string($conn, $_POST['service_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
$s_description = mysqli_real_escape_string($conn, $_POST['s_description']);
$s_price = mysqli_real_escape_string($conn, $_POST['s_price']);
$s_duration = mysqli_real_escape_string($conn, $_POST['s_duration']);

if (empty($name) || empty($s_name) || empty($s_description) || empty($s_price) || empty($s_duration)) {
    echo 2;
    exit;
} 
else {

$sql = "UPDATE service 
SET 
category_name='$name',
s_name='$s_name',
s_description='$s_description',
s_price='$s_price',
s_duration='$s_duration'
WHERE service_id='$service_id'";

$run = mysqli_query($conn, $sql);

if ($run) {
    echo 1;
} else {
    echo mysqli_error($conn); // debug
}

}
?>