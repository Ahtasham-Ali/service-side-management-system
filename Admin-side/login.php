<?php
include('./connection.php');
session_start();
if(isset($_POST['submit'])){
   $aemail = mysqli_real_escape_string($conn, $_POST['aemail']);
  $apassword = mysqli_real_escape_string($conn, $_POST['apassword']);

  if(empty($aemail) || empty($apassword)){
    $msg = "Fill All Inputs Fields";
  } else {

    $sql = "SELECT * FROM `login` WHERE `email`='$aemail' AND `password`='$apassword'";
    $run = mysqli_query($conn, $sql);

    if(!$run){
        die("Query Error: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($run) > 0){
      $fet = mysqli_fetch_assoc($run);

      $_SESSION['aemail'] = $fet['email'];
      $_SESSION['role'] = $fet['role'];
        

      header("location:./index.php");
      exit;   // IMPORTANT  
      
    } else {
      $msg = "Incorrect Email or Password";
    }
  }
}


// include('./navbar.php');  
?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css"> -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="assets/css/components.css"> -->
  <!-- Custom style CSS -->
  <!-- <link rel="stylesheet" href="assets/css/custom.css"> -->
  <link rel='shortcut icon' type='image/x-icon' href='images/favicon.png'>
 
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST"  class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="aemail" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="reset-password.php" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="apassword" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>