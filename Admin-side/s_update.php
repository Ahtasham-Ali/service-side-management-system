<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');

$u_id = $_GET['upid'];
$sql = "SELECT * FROM `service` WHERE `service_id`='$u_id'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
?>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>


<div class="container mt-5">
    <div class="col-md-6 mx-auto shadow p-4 rounded">
    <h2 class="mt-4">Add Service</h2>

    <form id="form1">
         <input type="hidden" name="service_id" value="<?php echo $fet['service_id']; ?>">



        <!-- Category Dropdown -->
        <div class="mb-3">
            <label>Category</label>
            <select name="name" class="form-control">
                <option>Select Category</option>

                <?php
                $csql = "SELECT * FROM `category`";
                $crun = mysqli_query($conn, $csql);

                while($cfetch = mysqli_fetch_assoc($crun)){
                ?>

                    <option value="<?php echo $cfetch['category_id']; ?>">
                        <?php echo $cfetch['name']; ?>
                    </option>
                <?php } ?>

            </select>
        </div>

        <!-- Service Name -->
        <div class="mb-3">
            <label>Service Name</label>
            <input type="text"  value="<?php echo $fet['s_name'] ?>" class="form-control" name="s_name">
        </div>
        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <input type="text"  value="<?php echo $fet['s_description'] ?>" class="form-control" name="s_description">
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label>Price</label>
            <input type="number"  value="<?php echo $fet['s_price'] ?>" class="form-control" name="s_price">
        </div>

        <!-- Duration -->
        <div class="mb-3">
            <label>Duration</label>
            <input type="text"  value="<?php echo $fet['s_duration'] ?>" class="form-control" name="s_duration">
        </div>


        <button type="submit" id="btn-submit" class="btn btn-primary form-control">Save</button>

    </form>
</div>
</div>

</body>
</html>	
<script>
    $("#btn-submit").click(function(e){
    e.preventDefault();

    var formData = new FormData(document.getElementById("form1"));

    $.ajax({
        url: "./sajax/ajax_update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res){
            res = res.trim();

            if(res == "1"){
                alert("Updated successfully");
                window.location.href = "s_view.php";
            } else {
                alert("Error: " + res);
            }
        }
    });
});
</script>
</body>
</html>