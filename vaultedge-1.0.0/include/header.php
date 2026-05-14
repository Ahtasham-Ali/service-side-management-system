<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check karein agar user ne pehle register kiya hua hai (Cookie ki madad se)
$has_registered_before = isset($_COOKIE['user_was_here']) || isset($_GET['registered']);

// Agar URL mein registered=true aaye (matlab abhi register hua hai), to cookie set kar dein 1 saal ke liye
if (isset($_GET['registered'])) {
    setcookie('user_was_here', 'true', time() + (86400 * 365), "/"); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="VaultEdge - Premium financial planning and investment management">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>VaultEdge - Service Management</title>

    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/custom-override.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/all.min.css">
    
    <style>
        .ve-cta-logout { background-color: #e74c3c !important; border-radius: 5px; color: white !important; }
        .ve-nav-cta-group { display: flex; align-items: center; gap: 10px; }
        
        /* Naya Login Button Style */
        .ve-cta-login-outline {
            background-color: transparent !important;
            border: 2px solid #ffc107 !important;
            color: #ffc107 !important;
            transition: 0.3s all;
        }
        .ve-cta-login-outline:hover {
            background-color: #ffc107 !important;
            color: #000 !important;
        }
    </style>
</head>

<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    <header class="ve-header" id="ve-sticky">
        <div class="container-fluid ve-nav-wrap">
            <div class="ve-logo">
                <a href="index.php">
                    <span class="ve-logo-icon">V</span>
                    <span class="ve-logo-text">Vault<strong>Edge</strong></span>
                </a>
            </div>

            <nav class="ve-nav">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li class="has-drop">
                        <a href="about.php">About <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="services.php">Our Services</a></li>
                        </ul>
                    </li>
                    <li><a href="services.php">Services</a></li>
                    <!-- <li><a href="post.php">Insights</a></li> -->
                    <li><a href="contact.php">Contact</a></li>
                    
                    <li>
                        <a href="t_insert.php" style="color: #ffc107; font-weight: bold; border: 1px solid #ffc107; padding: 5px 15px; border-radius: 20px; margin-left: 10px;">
                            <i class="fa fa-user-plus"></i> Become a Tech
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="ve-nav-cta-group">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <div class="ve-nav-cta">
                        <a href="logout.php" class="ve-cta-btn ve-cta-logout">
                            LOGOUT <i class="fa fa-sign-out"></i>
                        </a>
                    </div>

                <?php else : ?>
                    <div class="ve-nav-cta">
                        <a href="./contact.php" class="ve-cta-btn ve-cta-login-outline">
                            LOGIN <i class="fa fa-lock"></i>
                        </a>
                    </div>

                    <div class="ve-nav-cta">
                        <?php if ($has_registered_before) : ?>
                            <a href="./contact.php" class="ve-cta-btn">
                                DASHBOARD <i class="fa fa-arrow-right"></i>
                            </a>
                        <?php else : ?>
                            <a href="register.php" class="ve-cta-btn">
                                REGISTER <i class="fa fa-user-plus"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <button class="ve-toggler" id="ve-toggle">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="ve-mobile-menu" id="ve-mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li><a href="logout.php" style="color: #e74c3c;">Logout</a></li>
                <?php else : ?>
                    <?php if ($has_registered_before) : ?>
                        <li><a href="./contact.php">Dashboard</a></li>
                    <?php else : ?>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                    <li><a href="./contact.php">Login</a></li>
                <?php endif; ?>
                
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="t_insert.php" style="color: #ffc107;">Become a Tech</a></li>
            </ul>
        </div>
    </header>