<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<div class="container mt-5">
<div class="col-md-12 shadow p-4 rounded">

<h2>View Payments</h2>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Booking ID</th>
<th>Amount</th>
<th>Method</th>
<th>Transaction</th>
<th>Status</th>

<th>Delete</th>

</tr>
</thead>

<tbody id="payment_data">

</tbody>

</table>

</div>
</div>

<script>
$(document).ready(function(){

    // Load table data
    loadData();

    function loadData(){
        $.ajax({
            url:"./bookingajax/ajax_view.php",
            type:"GET",
            success:function(data){
                $("#payment_data").html(data);
            }
        });
    }

    // Delete payment
    $(document).on('click','.btn-delete',function(){
        if(confirm("Are you sure you want to delete this payment?")){
            var id = $(this).data('id');
            $.ajax({
                url:"./bookingajax/ajax_delete.php",
                type:"POST",
                data:{payment_id:id},
                success:function(res){
                    res = res.trim();
                    if(res == "1"){
                        alert("Payment deleted successfully");
                        loadData(); // Refresh table
                    }else{
                        alert("Error: "+res);
                    }
                }
            });
        }
    });

});
</script>