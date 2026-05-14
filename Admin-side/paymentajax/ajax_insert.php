<?php
include('../connection.php');

$booking_id = $_POST['booking_id'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];

// Cash ke liye random transaction ID aur status
$transaction_id = "CASH-" . time();
$payment_status = "Completed";

$sql = "INSERT INTO payments 
(booking_id, amount, payment_method, transaction_id, payment_status, payment_date)
VALUES 
('$booking_id', '$amount', '$payment_method', '$transaction_id', '$payment_status', NOW())";

if(mysqli_query($conn, $sql)){
    echo 1;
} else {
    echo "Insert Failed: " . mysqli_error($conn);
}
?>