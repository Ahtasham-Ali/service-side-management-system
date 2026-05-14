
<?php
include('./include/header.php');
include('./connection.php');

// --- SMART SEARCH LOGIC ---
$search_val = "";
// Base query jo hamesha approved technicians dikhaye
$sql = "SELECT * FROM technician WHERE status='approved'";

if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $search_val = mysqli_real_escape_string($conn, $_GET['search_query']);
    
    // Yahan 'WHERE' ki jagah 'AND' use karein aur brackets lagayein
    if(is_numeric($search_val)) {
        $sql .= " AND (service_charges <= '$search_val' OR skill LIKE '%$search_val%')";
    } else {
        $sql .= " AND (skill LIKE '%$search_val%' OR name LIKE '%$search_val%')";
    }
}

$get_techs = mysqli_query($conn, $sql);
?>
<section class="py-4 border-bottom bg-white">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="fw-bold mb-0">Our <span class="text-primary">Technicians</span></h2>
                <p class="text-muted mb-0">Find the right expert for your work.</p>
            </div>
            
            <div class="col-md-6 mt-3 mt-md-0">
                <form action="services.php" method="GET" class="d-flex justify-content-md-end">
                    <div class="search-box">
                        <input type="text" name="search_query" class="form-control" 
                               placeholder="Search skill or budget..." 
                               value="<?php echo $search_val; ?>">
                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <?php if(!empty($search_val)): ?>
                    <div class="text-md-end mt-1">
                        <a href="services.php" class="text-danger small text-decoration-none">
                            <i class="fas fa-times-circle"></i> Clear filters
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row g-4">
            <?php 
            if(mysqli_num_rows($get_techs) > 0) {
                while($row = mysqli_fetch_assoc($get_techs)) { 
                    $tid = $row['technician_id']; 
                    $name = $row['name'];
                    $skil = $row['skill']; 
                    $img = $row['profile_image'];    
                    $charges = $row['service_charges'];
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 technician-card">
                    <div class="position-relative overflow-hidden rounded-top-4" style="height: 220px;">
                        <img src="../uploads/technicians/<?php echo $img; ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo $name; ?>">
                        <div class="price-badge">Rs. <?php echo $charges; ?></div>
                    </div>
                    <div class="card-body p-3 text-center">
                        <h6 class="fw-bold mb-1 text-dark"><?php echo $name; ?></h6>
                        <p class="text-primary small fw-semibold mb-3"><?php echo $skil; ?></p>
                        <a href="technician-detail.php?id=<?php echo $tid; ?>" class="btn btn-sm btn-primary w-100 rounded-pill">View Profile</a>
                    </div>
                </div>
            </div>
            <?php 
                }
            } else {
                echo "<div class='col-12 text-center py-5'><p class='text-muted'>No technicians found.</p></div>";
            }
            ?>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<style>
    /* Compact Search Box Styling */
    .search-box {
        position: relative;
        width: 100%;
        max-width: 350px; /* Chhota size */
    }
    .search-box .form-control {
        border-radius: 50px;
        padding-right: 50px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        font-size: 14px;
        height: 45px;
    }
    .btn-search {
        position: absolute;
        right: 5px;
        top: 5px;
        border: none;
        background: #0d6efd;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        transition: 0.3s;
    }
    .btn-search:hover { background: #0b5ed7; }

    /* Card Styling */
    .technician-card { transition: 0.3s; border: 1px solid #eee !important; }
    .technician-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    .price-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(25, 135, 84, 0.9);
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: bold;
    }
    .object-fit-cover { object-fit: cover; }
</style>

<?php include('./include/footer.php'); ?>