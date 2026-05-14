<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');

$u_id = $_GET['upid'];

$sql = "SELECT * FROM booking WHERE booking_id='$u_id'";
$run = mysqli_query($conn,$sql);
$fet = mysqli_fetch_assoc($run);
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<div class="container mt-5">
<div class="col-md-6 mx-auto shadow p-4 rounded">

<h2 class="mt-4">Update Booking</h2>

<form id="form1">

<input type="hidden" name="booking_id" value="<?php echo $fet['booking_id']; ?>">

<!-- USER -->
<div class="mb-3">
<label>User</label>
<select name="u_name" class="form-control">

<?php
$csql="SELECT * FROM user";
$crun=mysqli_query($conn,$csql);

while($cfetch=mysqli_fetch_assoc($crun)){
?>
<option value="<?php echo $cfetch['user_name']; ?>"
<?php if(isset($fet['user_name']) && $cfetch['user_name']==$fet['user_name']){ echo "selected"; } ?>>

<?php echo $cfetch['user_name']; ?>
</option>

<?php } ?>

</select>
</div>



<!-- SERVICE -->
<div class="mb-3">
<label>Service</label>
<select name="s_name" class="form-control">

<?php
$csql="SELECT * FROM service";
$crun=mysqli_query($conn,$csql);

while($cfetch=mysqli_fetch_assoc($crun)){
?>
<option value="<?php echo $cfetch['service_id']; ?>"
<?php if(isset($fet['service_id']) && $cfetch['service_id']==$fet['service_id']){ echo "selected"; } ?>>

<?php echo $cfetch['s_name']; ?>
</option>
<?php } ?>

</select>
</div>
<!-- TECHNICIAN -->
<div class="mb-3">
<label>Technician</label>
<select name="t_name" class="form-control">

<?php
$csql="SELECT * FROM technician";
$crun=mysqli_query($conn,$csql);

while($cfetch=mysqli_fetch_assoc($crun)){
?>
<option value="<?php echo $cfetch['technician_id']; ?>"
<?php if(isset($fet['technician_id']) && $cfetch['technician_id']==$fet['technician_id']){ echo "selected"; } ?>>

<?php echo $cfetch['name']; ?>
</option>
<?php } ?>

</select>
</div>


<!-- BOOKING DATE -->
<div class="mb-3">
<label>Booking Date</label>
<input type="date" value="<?php echo $fet['b_date']; ?>" class="form-control" name="b_date">
</div>


<!-- SERVICE DATE -->
<div class="mb-3">
<label>Service Date</label>
<input type="date" value="<?php echo $fet['s_date']; ?>" class="form-control" name="s_date">
</div>


<!-- SERVICE TIME -->
<div class="mb-3">
<label>Service Time</label>
<input type="time" value="<?php echo $fet['s_time']; ?>" class="form-control" name="s_time">
</div>


<!-- TOTAL AMOUNT -->
<div class="mb-3">
<label>Total Amount</label>
<input type="text" value="<?php echo $fet['total_amount']; ?>" class="form-control" name="total_amount">
</div>


<!-- STATUS -->
<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="pending" <?php if($fet['status']=="pending"){echo "selected";}?>>
Pending
</option>

<option value="confirmed" <?php if($fet['status']=="confirmed"){echo "selected";}?>>
Confirmed
</option>

<option value="completed" <?php if($fet['status']=="completed"){echo "selected";}?>>
Completed
</option>

<option value="cancelled" <?php if($fet['status']=="cancelled"){echo "selected";}?>>
Cancelled
</option>

</select>
</div>


<!-- ADDRESS -->
<div class="mb-3">
<label>Address</label>
<input type="text" value="<?php echo $fet['address']; ?>" class="form-control" name="address">
</div>


<button type="submit" id="btn-submit" class="btn btn-primary form-control">
UPDATE
</button>

</form>
</div>
</div>

<script>
$("#btn-submit").click(function(e){
    e.preventDefault(); // ❗ VERY IMPORTANT

    var formData = new FormData(document.getElementById("form1"));

    $.ajax({
        url: "./bajax/ajax_update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res){
            res = res.trim();
            console.log(res);

            if(res == "1"){
                alert("Updated successfully");
            } else {
                alert("Error: " + res);
            }
        }
    });
});
</script>
</body>
</html>