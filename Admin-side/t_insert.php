<?php
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<div class="container mt-5">
    <div class="col-md-8 mx-auto shadow p-4 rounded bg-white">
        <h3 class="text-center mb-4">Technician Registration</h3>

        <form id="form1" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Skill</label>
                    <input type="text" class="form-control" id="skill" name="skill" required>
                </div>
                  <div class="col-md-6 mb-3">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                   <div class="col-md-6 mb-3">
                    <label>Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience" required>
                </div>
                 <div class="col-md-6 mb-3">
                    <label>Service_charges</label>
                    <input type="number" class="form-control" id="service_charges" name="service_charges" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Technician_CNIC</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" required>
                </div>
            </div>
                        <!-- <div class="row">
                 <div class="col-md-12 mb-3">
                    <label>Created At</label>
                    <input type="date" class="form-control" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                </div>
                </div> -->


            <hr>
            <div class="mb-3">
                <label><b>Profile Image (Single)</b></label>
                <input type="file" class="form-control" name="profile_image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label><b>Portfolio Images (Select Multiple)</b></label>
                <input type="file" class="form-control" name="portfolio[]" accept="image/*" multiple required>
                <small class="text-muted">Aap ek se zyada images select kar sakte hain.</small>
            </div>

            <button type="button" id="btn-submit" class="btn btn-primary w-100 mt-3">Register Technician</button>
        </form>
    </div>
</div>

<?php include('./include/footer.php'); ?>

<script>
$("#btn-submit").on("click", function(e) {
    e.preventDefault();
    
    // Check if form is valid (basic browser check)
    var form = $("#form1")[0];
    if (form.checkValidity() === false) {
        alert("Please fill all required fields and select images.");
        return;
    }

    var formData = new FormData(form);

    $.ajax({
        url: "./tajax/ajax_insert.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            if (res.trim() == "1") {
                $("#form1").trigger("reset");
                alert("Technician registered successfully!");
            } else {
                alert("Error: " + res);
            }
        }
    });
});
</script>