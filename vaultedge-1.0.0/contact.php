<?php
session_start();
include('./connection.php');

// 1. Agar user pehle se login hai, to use homepage par bhej dein
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = "";

// 2. Login Logic jab button click ho
if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query aapke naye table structure ke mutabiq
    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Sessions set karein (Naye columns ke mutabiq)
        $_SESSION['user_id'] = $user['l_id'];
        $_SESSION['user_fname'] = $user['fname'];
        $_SESSION['user_lname'] = $user['lname'];
        $_SESSION['user_role'] = $user['role'];

        // 3. REDIRECT LOGIC: 
        // Agar URL mein 'redirect' parameter hai (jo contact/booking se aaya ho)
        if (isset($_GET['redirect'])) {
            $url = $_GET['redirect'];
            header("Location: " . $url);
        } else {
            // Default: Agar direct login kiya hai to index par jaye
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Invalid Email or Password!";
    }
}

include('./include/header.php'); 
?>

<style>
    .login-wrapper {
        background: #f4f7f6;
        padding: 100px 0; /* Header/Footer se space */
        min-height: 80vh;
        display: flex;
        align-items: center;
    }
    .login-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .login-info-panel {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    .form-control-lg {
        border-radius: 10px;
        font-size: 1rem;
    }
    .btn-login {
        padding: 12px;
        border-radius: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                
                <div class="card login-card">
                    <div class="row g-0">
                        <div class="col-md-5 d-none d-md-flex login-info-panel">
                            <i class="fas fa-tools fa-4x mb-4"></i>
                            <h2 class="fw-bold">VaultEdge</h2>
                            <p class="px-3">Login to book professional technicians and manage your service history.</p>
                        </div>

                        <div class="col-md-7 bg-white p-4 p-md-5">
                            <div class="mb-4 text-center text-md-start">
                                <h3 class="fw-bold">Sign In</h3>
                                <p class="text-muted small">Access your account to continue</p>
                            </div>

                            <?php if($error != ""): ?>
                                <div class="alert alert-danger border-0 py-2 small mb-4">
                                    <i class="fas fa-exclamation-triangle me-2"></i> <?php echo $error; ?>
                                </div>
                            <?php endif; ?>

                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" class="form-control form-control-lg border-start-0 bg-light" placeholder="email@example.com" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                        <input type="password" name="password" class="form-control form-control-lg border-start-0 bg-light" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <button type="submit" name="login_btn" class="btn btn-primary w-100 btn-login shadow mb-3">
                                    Login <i class="fas fa-arrow-right ms-2"></i>
                                </button>

                                <div class="text-center mt-4">
                                    <p class="small text-muted mb-0">Don't have an account?</p>
                                    <a href="register.php" class="text-primary fw-bold text-decoration-none">Create Account Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="index.php" class="text-muted text-decoration-none small"><i class="fas fa-chevron-left me-1"></i> Back to Homepage</a>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('./include/footer.php'); ?>