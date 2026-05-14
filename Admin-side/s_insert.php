<?php
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<div class="container mt-5">
    <div class="col-md-6 mx-auto shadow p-4 rounded">
    <h2 class="mt-4">Add Service</h2>

    <form id="form1">

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
            <input type="text" name="s_name" class="form-control">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="s_description" class="form-control"></textarea>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="s_price" class="form-control">
        </div>

        <!-- Duration -->
        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="s_duration" class="form-control" placeholder="e.g 30 min">
        </div>


        <button type="submit" id="btn-submit" class="btn btn-primary form-control">Submit</button>

    </form>
</div>
</div>

</body>
</html>	


<?php
include('./include/footer.php');
?>
<script>
$("#btn-submit").on("click", function(e){
    e.preventDefault();

    var formData = new FormData($("#form1")[0]);

    $.ajax({
        url: "./sajax/ajax_insert.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,

        success: function(res){
            if(res == 1){
                $("#form1").trigger("reset");
                alert("Data Insert");
            } else {
                alert("Data Not Insert");
            }
        }
    });
});
</script>