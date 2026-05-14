<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');

$u_id = $_GET['upid'];
$sql = "SELECT * FROM `category` WHERE `category_id`='$u_id'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Update category</title>
</head>
<body>

<div class="container mt-5">
    <div class="col-md-6 mx-auto shadow p-4 rounded">
        <h3 class="text-center">Update category</h3>

        <form id="update_form">
            <input type="hidden" name="category_id" value="<?php echo $fet['category_id']; ?>">

            <div class="mb-3">
                <label>Name</label>
             <input type="text"  value="<?php echo $fet['name'] ?>" class="form-control" name="name" placeholder="Name">
                    </div>

            <div class="mb-3">
                <label>Description</label>
             <input type="text"  value="<?php echo $fet['description'] ?>" class="form-control" name="description" placeholder="Description">
                    </div>

            <div class="mb-3">
                <label>status</label>
             <input type="text"  value="<?php echo $fet['status'] ?>" class="form-control" name="status" placeholder="status">
                    </div>

            <div class="mb-3">
                <label>Created At</label>
             <input type="text"  value="<?php echo $fet['created_at'] ?>" class="form-control" name="created_at" placeholder="created_at">
                    </div>

            <button type="button" id="btn_update" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>


<script>

$("#btn_update").click(function(){
    var formData = new FormData(document.getElementById("update_form"));

    $.ajax({
        url: "./cajax/ajax_update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res){
            res = res.trim();
            if(res == "1"){
                Swal.fire("Success","Data Updated","success");
                setTimeout(function(){ window.location="category_view.php"; },1500);
            } else if(res == "2"){
                Swal.fire("Error","Please fill all fields","error");
            } else {
                Swal.fire("Error","Update Failed","error");
            }
        },
        error: function(){
            Swal.fire("Error","Something went wrong","error");
        }
    });
});
</script>

</body>
</html>