<?php
include('./include/header.php');
// include('./include/sidebar.php');
include('./connection.php');

$get_amount = isset($_GET['amount']) ? $_GET['amount'] : '';
?>

<div class="container mt-5">
    <div class="col-md-6 mx-auto shadow p-4 rounded bg-white">
        <h2>Add Payment</h2>
        <form id="payment_form">
            <!-- <label>Select Booking</label> -->
            <select name="booking_id" id="booking_id" class="form-control mb-3" required>
                <option value="">Select Booking</option>
                <?php
                $res = mysqli_query($conn, "SELECT booking_id FROM booking ORDER BY booking_id DESC");
                while($row = mysqli_fetch_assoc($res)){
                    echo "<option value='".$row['booking_id']."'>Booking #".$row['booking_id']."</option>";
                }
                ?>
            </select>

            <label>Amount</label>
            <input type="number" name="amount" id="amount" class="form-control mb-3" value="<?php echo $get_amount; ?>" required>

            <label>Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control mb-4">
                <option value="cash">Cash</option>
                <option value="stripe">Use Card (Stripe)</option>
            </select>

            <button type="submit" id="btn-submit" class="btn btn-primary w-100">Process Payment</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$("#btn-submit").click(function(e) {
    e.preventDefault();
    var method = $("#payment_method").val();
    var formData = $("#payment_form").serialize(); 

    if (method === "stripe") {
        $.ajax({
            url: "stripe/create-checkout-session.php", // Path check karein
            type: "POST",
            data: formData,
            success: function(session_url) {
                var url = session_url.trim();
                if (url.includes("http")) {
                    window.location.href = url;
                } else {
                    alert("Stripe Error: " + url);
                }
            }
        });
    } else {
        $.ajax({
            url: "paymentajax/ajax_insert.php", // Path check karein
            type: "POST",
            data: formData,
            success: function(res) {
                if(res.trim() == "1") {
                    alert("Cash Payment Added!");
                    location.reload();
                } else {
                    alert(res);
                }
            }
        });
    }
});
</script>