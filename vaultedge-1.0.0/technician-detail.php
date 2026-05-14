<?php
// Error reporting on rakhein taake error nazar aaye
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('./connection.php');
include('./include/header.php');

// 1. GET ID FROM URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $tid = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Fetch Technician Data
    $sql_tech = "SELECT * FROM technician WHERE technician_id = '$tid' AND status = 'approved'";
    $query_tech = mysqli_query($conn, $sql_tech);
    
    if(!$query_tech){
        die("Database Query Failed: " . mysqli_error($conn));
    }
    
    $tech = mysqli_fetch_assoc($query_tech);
    
    if(!$tech) {
        echo "<div class='container text-center' style='margin-top:150px;'>
                <div class='alert alert-danger'>Technician Profile Not Found or Not Approved.</div>
                <a href='index.php' class='btn btn-primary'>Back to Home</a>
              </div>";
        include('./include/footer.php');
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

$is_logged_in = isset($_SESSION['user_id']);

// 2. COMMENT INSERT LOGIC
if(isset($_POST['submit_comment']) && $is_logged_in) {
    $u_id = $_SESSION['user_id']; 
    $comment_txt = mysqli_real_escape_string($conn, $_POST['comment_text']);
    
    if(!empty($comment_txt)) {
        $sql_ins = "INSERT INTO `comments` (`user_id`, `technician_id`, `comments`) VALUES ('$u_id', '$tid', '$comment_txt')";
        if(mysqli_query($conn, $sql_ins)) {
            // Refresh page to show new comment
            echo "<script>window.location.href='technician-detail.php?id=$tid';</script>";
        }
    }
}
?>

<style>
    body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
    .top-margin { margin-top: 110px; }
    .main-card { background: white; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border: none; overflow: hidden; }
    .tech-img { width: 100%; height: 500px; object-fit: cover; }
    .info-padding { padding: 40px; }
    .price-tag { font-size: 28px; color: #0d6efd; font-weight: 800; }
    .portfolio-img { height: 100px; width: 100%; object-fit: cover; border-radius: 12px; border: 2px solid #eee; transition: 0.3s; }
    .portfolio-img:hover { transform: scale(1.05); border-color: #0d6efd; }
    .comment-section-wrapper { background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
    .user-avatar { width: 45px; height: 45px; background: #0d6efd; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; }
</style>

<div class="container top-margin mb-5">
    <div class="main-card mb-5">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="../uploads/technicians/<?php echo $tech['profile_image']; ?>" class="tech-img" onerror="this.src='https://via.placeholder.com/500x600'">
            </div>
            <div class="col-md-7 info-padding">
                <span class="badge bg-primary rounded-pill mb-3 px-3 py-2"><?php echo htmlspecialchars($tech['skill']); ?></span>
                <h1 class="display-6 fw-bold mb-2"><?php echo htmlspecialchars($tech['name']); ?></h1>
                <p class="text-muted mb-4"><i class="fas fa-map-marker-alt me-2 text-danger"></i><?php echo htmlspecialchars($tech['address']); ?></p>
                
                <div class="row bg-light rounded-4 p-3 mb-4 text-center">
                    <div class="col-6 border-end">
                        <small class="text-uppercase fw-bold text-muted d-block">Experience</small>
                        <span class="h5 fw-bold"><?php echo htmlspecialchars($tech['experience']); ?></span>
                    </div>
                    <div class="col-6">
                        <small class="text-uppercase fw-bold text-muted d-block">Charges</small>
                        <span class="price-tag">Rs. <?php echo number_format($tech['service_charges']); ?></span>
                    </div>
                </div>

                <h6 class="fw-bold mb-3">Work Portfolio</h6>
                <div class="row g-2 mb-4">
                    <?php 
                    if(!empty($tech['portfolio_images'])) {
                        $imgs = explode(',', $tech['portfolio_images']);
                        foreach($imgs as $i) {
                            $img_name = trim($i);
                            if(!empty($img_name)){
                                echo "<div class='col-3'><img src='../uploads/technicians/$img_name' class='portfolio-img' onerror=\"this.src='https://via.placeholder.com/150'\"></div>";
                            }
                        }
                    } else { echo "<p class='text-muted small'>No portfolio images.</p>"; }
                    ?>
                </div>

                <?php if($is_logged_in): ?>
                    <a href="../admin-side/add_payment.php?id=<?php echo $tid; ?>" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">Book Service Now</a>
                <?php else: ?>
                    <a href="contact.php" class="btn btn-warning btn-lg w-100 rounded-pill fw-bold">Login to Book</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="comment-section-wrapper mb-4">
                <h4 class="fw-bold mb-4">Leave a Review</h4>
                <?php if($is_logged_in): ?>
                    <form method="POST">
                        <textarea name="comment_text" class="form-control border-0 bg-light p-3 mb-3" rows="3" placeholder="Apna experience share karein..." style="border-radius: 15px;" required></textarea>
                        <button type="submit" name="submit_comment" class="btn btn-dark px-5 py-2 rounded-pill">Submit Review</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-light text-center rounded-4">
                        Please <a href="contact.php" class="fw-bold">Login</a> to leave a comment.
                    </div>
                <?php endif; ?>
            </div>
<div class="comment-section-wrapper">
    <h4 class="fw-bold mb-4">User Feedbacks</h4>
    <?php
    // Simple direct query without complex joins first to test
    $tid = $_GET['id']; 
    $sql_show = "SELECT * FROM `comments` WHERE technician_id = '$tid' ORDER BY comments_id DESC";
    $res_show = mysqli_query($conn, $sql_show);

    if (mysqli_num_rows($res_show) > 0) {
        while($row = mysqli_fetch_assoc($res_show)) {
            // User name fetch karne ke liye alag query (agar join masla kar raha ho)
            $curr_u_id = $row['user_id'];
            $u_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$curr_u_id'");
            $u_data = mysqli_fetch_assoc($u_query);
            $u_name = ($u_data) ? $u_data['name'] : "Customer";
            ?>
            <div class="d-flex mb-4 border-bottom pb-3">
                <div class="user-avatar me-3" style="width:45px; height:45px; background:#0d6efd; color:white; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                    <?php echo strtoupper(substr($u_name, 0, 1)); ?>
                </div>
                <div class="w-100">
                    <h6 class="fw-bold mb-1"><?php echo $u_name; ?></h6>
                    <p class="text-secondary mb-0"><?php echo $row['comments']; ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center'>No reviews found for ID: $tid</p>";
    }
    ?>
</div>
        </div>
    </div>
</div>

<?php include('./include/footer.php'); ?>