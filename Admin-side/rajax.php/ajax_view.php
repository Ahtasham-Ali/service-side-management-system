<?php
include('../connection.php');

$sql = "SELECT 
            r.review_id,
            b.booking_id,   -- Booking کا اصل نام
            u.user_name,      -- User کا اصل نام
            r.rating,
            r.comments
        FROM review r
        INNER JOIN user u ON r.user_name = u.user_id
        INNER JOIN booking b ON r.booking_name = b.booking_id";

// $run = mysqli_query($conn, $sql);
$run = mysqli_query($conn, $sql);
if(!$run){
    die("Query failed: " . mysqli_error($conn));
}

while($fet = mysqli_fetch_assoc($run)){
?>
<tr>
    <td><?php echo $fet['review_id']; ?></td>
    <td><?php echo $fet['booking_id']; ?></td>  <!-- اب booking کا نام آئے گا -->
    <td><?php echo $fet['user_name']; ?></td>     <!-- اب user کا نام آئے گا -->
    <td><?php echo $fet['rating']; ?></td>
    <td><?php echo $fet['comments']; ?></td>
    <td>
        <button id="btn-del" data-del="<?php echo $fet['review_id']; ?>" class="btn btn-danger">Delete</button>
    </td>
</tr>
<?php
}
?>
