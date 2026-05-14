<?php
include('../connection.php');
$booking_id = $_POST['booking_id'];
$user_name = $_POST['u_name'];
$service_name = $_POST['s_name'];
$technician_name = $_POST['t_name'];
$b_date = $_POST['b_date'];
$s_date = $_POST['s_date'];
$s_time = $_POST['s_time'];
$total_amount = $_POST['total_amount'];
$status = $_POST['status'];
$address = $_POST['address'];

$sql = "UPDATE booking SET
user_name='$user_name',
service_name='$service_name',
technician_name='$technician_name',
b_date='$b_date',
s_date='$s_date',
s_time='$s_time',
total_amount='$total_amount',
status='$status',
address='$address'
WHERE booking_id='$booking_id'";

$run = mysqli_query($conn, $sql);

if ($run) {
    echo 1;
} else {
    echo mysqli_error($conn); // Shows real error
}
?>