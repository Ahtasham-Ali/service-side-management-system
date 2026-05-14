<?php
session_start();
include('./connection.php');

$message = "";

if (isset($_POST['register_btn'])) {
    // 1. Data collect aur sanitize karein
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

    // 2. Passwords match check karein
    if ($password !== $c_password) {
        $message = "<div class='alert alert-danger'>Passwords do not match!</div>";
    } else {
        // 3. Check karein email pehle se to nahi hai
        $check_email = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $message = "<div class='alert alert-warning'>Email already exists!</div>";
        } else {
            // 4. Naye columns ke mutabiq INSERT query
            // Default role hum 'user' rakh rahe hain
            $query = "INSERT INTO login (fname, lname, email, password, role) 
                      VALUES ('$fname', '$lname', '$email', '$password', 'user')";
            
            if (mysqli_query($conn, $query)) {
                $message = "<div class='alert alert-success'>Account created successfully! <a href='login.php'>Login now</a></div>";
            } else {
                $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}

include('./include/header.php');
?>

<section class="py-5" style="background:#f4f7f6; min-height:80vh; display:flex; align-items:center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-center text-white">
                        <h3 class="fw-bold mb-0 text-white">Create Account</h3>
                        <p class="small mb-0 text-white-50">Join VaultEdge service portal</p>
                    </div>
                    <div class="card-body p-4 p-md-5 bg-white">
                        
                        <?php echo $message; ?>

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold">First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Enter Your Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold">Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Confirm Password</label>
                                <input type="password" name="c_password" class="form-control" placeholder="Enter conform password" required>
                            </div>

                            <button type="submit" name="register_btn" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">
                                SIGN UP <i class="fas fa-user-plus ms-2"></i>
                            </button>

                            <div class="text-center mt-4">
                                <p class="small text-muted">Already have an account? <a href="login.php" class="fw-bold text-decoration-none">Login Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./include/footer.php'); ?>