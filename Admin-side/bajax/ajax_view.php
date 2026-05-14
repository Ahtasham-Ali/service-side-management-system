<?php
include('../connection.php');

// LEFT JOIN use karein taake agar koi detail missing bhi ho to booking nazar aaye
$sql = "SELECT b.*, u.user_name as customer, s.s_name, t.name as tech_name 
        FROM `booking` b 
        LEFT JOIN `user` u ON b.user_name = u.user_id 
        LEFT JOIN `service` s ON b.service_name = s.service_id 
        LEFT JOIN `technician` t ON b.technician_name = t.technician_id 
        ORDER BY b.booking_id DESC";

$run = mysqli_query($conn, $sql);

if (!$run) {
    die("Query Error: " . mysqli_error($conn)); 
}

if (mysqli_num_rows($run) > 0) {
    while($fet = mysqli_fetch_assoc($run)) {
        ?>
        <tr>
            <td><?php echo $fet['booking_id']; ?></td>
            <td><?php echo $fet['customer']; ?></td> 
            <td><?php echo $fet['s_name']; ?></td>
            <td><?php echo $fet['tech_name']; ?></td>
            <td><?php echo $fet['b_date']; ?></td>
            <td><?php echo $fet['s_date']; ?></td>
            <td><?php echo $fet['s_time']; ?></td>
            <td><?php echo $fet['total_amount']; ?></td>
            <td><?php echo $fet['status']; ?></td>
            <td><?php echo $fet['address']; ?></td>
            <td>
                <a href="./b_update.php?upid=<?php echo $fet['booking_id'] ?>" class="btn btn-primary btn-sm">Update</a>
            </td>
            <td>
                <button id="btn-del" data-del="<?php echo $fet['booking_id'] ?>" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='12' class='text-center text-danger'>No Bookings Found in Database</td></tr>";
}
?>