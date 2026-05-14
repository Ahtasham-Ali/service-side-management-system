<?php
include('./connection.php');
$msg = "";

if(isset($_POST['sub'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if(empty($email) || empty($password) || empty($cpassword)){
        $msg = "Please fill all input fields!";
    } 
    elseif($password !== $cpassword){
        $msg = "Passwords do not match!";
    } 
    else {
        // Check if email exists
        $checkEmail = "SELECT * FROM `login` WHERE `email`='$email'";
        $res = mysqli_query($conn, $checkEmail);

        if(mysqli_num_rows($res) > 0){
            // FIX: Yahan se maine cpassword column hata diya hai
            $sql = "UPDATE `login` SET `password`='$password' WHERE `email`='$email'";
            $run = mysqli_query($conn, $sql);

            if($run){
                echo "<script>
                        alert('Success! Admin Password has been reset.');
                        window.location.href='login.php';
                      </script>";
                exit();
            } else {
                // Agar koi aur error aaye toh ye batayega
                $msg = "Error: " . mysqli_error($conn);
            }
        } else {
            $msg = "Error: This email address is not registered!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Admin Password - Otika</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel='shortcut icon' type='image/x-icon' href='images/favicon.png'>
  <style>
      .card-primary { border-top: 2px solid #6777ef; }
      .alert { margin-bottom: 20px; }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>
              
              <div class="card-body">
                <?php if (!empty($msg)) : ?>
                    <div class="alert alert-danger text-center"><?= $msg ?></div>
                <?php endif; ?>

                <p class="text-muted">Enter your registered email and set a new password.</p>
                
                <form method="POST" action="">
                  <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="cpassword" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="sub" class="btn btn-primary btn-lg btn-block">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Remember your password? <a href="login.php">Login here</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>