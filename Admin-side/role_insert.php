<?php 
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>
<!DOCTYPE html>
<html>
<head>

<title>Add Role</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 id="msg">Add Role</h4>

</div>

<div class="card-body">

<form id="roleForm">

<div class="mb-3">

<label class="form-label">Role Name</label>

<input type="text" class="form-control" name="role_name" required>

</div>


<div class="mb-3">

<label class="form-label">Access Type</label>

<select class="form-control" name="role_access" id="access">

<option value="">Select Access</option>
<option value="all">All Access</option>
<option value="custom">Custom Access</option>

</select>

</div>


<div class="role_access" style="display:none">

<label class="fw-bold">Permissions</label>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="role[]" value="service">
<label class="form-check-label">Service</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="role[]" value="booking">
<label class="form-check-label">Booking</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="role[]" value="technician">
<label class="form-check-label">Technician</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="role[]" value="user">
<label class="form-check-label">User</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="role[]" value="payments">
<label class="form-check-label">Payments</label>
</div>

</div>

<br>

<button class="btn btn-success w-100" type="submit">
Add Role
</button>

</form>

</div>
</div>
</div>
</div>
</div>

<?php
include('./include/footer.php');
?>
<script>

$(document).ready(function(){

$('#access').change(function(){

if($(this).val()=="custom")
{
$('.role_access').slideDown();
}
else
{
$('.role_access').slideUp();
}

});


$('#roleForm').submit(function(e){

e.preventDefault();

$.ajax({

url:"./roleajax/ajax_insert.php",
type:"POST",
data:$(this).serialize(),

success:function(response){

$('#msg').html(response);

$('#roleForm')[0].reset();

$('.role_access').hide();

}

});

});

});

</script>

</body>
</html>