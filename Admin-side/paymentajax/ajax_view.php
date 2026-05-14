<?php
include('../connection.php');

$sql = "SELECT 
payments.payment_id,
payments.amount,
payments.payment_method,
payments.transaction_id,
payments.payment_status,
payments.payment_date,
booking.booking_id,
user.user_name,
service.s_name
FROM payments
JOIN booking ON booking.booking_id = payments.booking_id
JOIN user ON user.user_id = booking.user_id
JOIN service ON service.service_id = booking.service_id
ORDER BY payments.payment_id DESC";

$run = mysqli_query($conn,$sql);
if(!$run){
    die(mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($run)){
?>

<tr>
<td><?php echo $row['payment_id']; ?></td>
<td><?php echo $row['user_name']; ?> - <?php echo $row['s_name']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['payment_method']; ?></td>
<td><?php echo $row['transaction_id']; ?></td>
<td><?php echo $row['payment_status']; ?></td>
<td>
<button class="btn btn-danger btn-delete" data-id="<?php echo $row['payment_id']; ?>">Delete</button>
</td>
</tr>

<?php } ?>