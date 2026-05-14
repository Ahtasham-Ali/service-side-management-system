<?php include('./include/header.php'); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
    .form-header-gradient {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
        color: white; padding: 30px; border-radius: 10px 10px 0 0;
        margin: -25px -25px 30px -25px; text-align: center;
    }
    .registration-container { margin-top: 50px; margin-bottom: 50px; }
    .form-control:focus { border-color: #6610f2; box-shadow: 0 0 0 0.2rem rgba(102, 16, 242, 0.25); }
</style>

<div class="container registration-container">
    <div class="col-md-8 mx-auto shadow-lg p-4 rounded bg-white">
        <div class="form-header-gradient">
            <i class="fas fa-user-cog fa-3x mb-2"></i> 
            <h2 class="fw-bold">Technician Portal</h2>
            <p>Join our expert team</p>
        </div>

        <form id="technicianForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Full Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Phone Number</label>
                    <input type="text" class="form-control" name="phone" placeholder="03xx-xxxxxxx" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Skill</label>
                    <input type="text" class="form-control" name="skill" placeholder="e.g. Electrician" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Experience</label>
                    <input type="text" class="form-control" name="experience" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Service Charges (PKR)</label>
                    <input type="number" class="form-control" name="service_charges" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Technician CNIC</label>
                    <input type="text" class="form-control" name="cnic" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="fw-bold">Date of Registration</label>
                    <input type="date" class="form-control" name="created_at" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Profile Image</label>
                    <input type="file" class="form-control" name="profile_image" accept="image/*" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Portfolio (Multiple)</label>
                    <input type="file" class="form-control" name="portfolio[]" accept="image/*" multiple required>
                </div>
            </div>

            <button type="submit" id="submitBtn" class="btn btn-primary btn-lg w-100 mt-3">Register Now</button>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#technicianForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#submitBtn').prop('disabled', true).text('Sending Data...');

        $.ajax({
            url: './tajax/ajax_insert.php', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data.trim() == "1") {
                    alert("Success! Your profile is pending for admin approval.");
                    $('#technicianForm')[0].reset();
                } else {
                    alert("Error: " + data);
                }
                $('#submitBtn').prop('disabled', false).text('Register Now');
            }
        });
    });
});
</script>

<?php include('./include/footer.php'); ?>