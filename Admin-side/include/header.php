<?php
include('./connection.php'); 

// 1. Total comments ka count nikalne ke liye
$count_query = "SELECT COUNT(*) as total FROM `comments`";
$count_res = mysqli_query($conn, $count_query);

if (!$count_res) {
    $unread_count = 0;
} else {
    $count_data = mysqli_fetch_assoc($count_res);
    $unread_count = $count_data['total'];
}

/** * 2. JOIN Query: Hum 'comments' aur 'technician' table ko join kar rahe hain 
 * taake technician ki profile_image bhi mil sake.
 */
$notif_query = "SELECT c.*, t.profile_image 
                FROM `comments` c 
                LEFT JOIN `technician` t ON c.technician_id = t.technician_id 
                ORDER BY c.comments_id DESC LIMIT 10";
$notif_res = mysqli_query($conn, $notif_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-envelope mx-0"></i>
              <span class="count"><?php echo $unread_count; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have <?php echo $unread_count; ?> new comments</p>
              </div>
              <div class="dropdown-divider"></div>

              <?php 
              if($notif_res && mysqli_num_rows($notif_res) > 0) {
                while($row = mysqli_fetch_assoc($notif_res)) { 
                  
                  // FIXED IMAGE PATH: Admin folder se uploads folder tak ka rasta
                  // Agar technician ki profile_image table mein hai to wo uthao
                  $img_path = !empty($row['profile_image']) ? "../uploads/technicians/" . $row['profile_image'] : "images/faces/face4.jpg";
              ?>
                <a class="dropdown-item preview-item" href="../vaultedge-1.0.0/technician-detail.php?id=<?php echo $row['technician_id']; ?>#comment-<?php echo $row['comments_id']; ?>">
                  <div class="preview-thumbnail">
                      <img src="<?php echo $img_path; ?>" alt="image" class="profile-pic" onerror="this.src='images/faces/face4.jpg'">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium">New Comment</h6>
                    <p class="font-weight-light small-text text-muted">
                      <?php echo isset($row['comments']) ? substr($row['comments'], 0, 35) . "..." : "No text"; ?>
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
              <?php 
                } 
              } else {
                echo "<p class='text-center p-3 mb-0'>No comments yet</p>";
              }
              ?>
            </div>
          </li>

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/logo.svg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="./logout.php">
                <i class="fas fa-power-off text-primary"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">