

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <!-- Profile -->
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="include/post9.png" alt="image">
        </div>
        <div class="profile-name">
          <p class="name">Welcome Admin</p>
          <p class="designation">Super Admin</p>
        </div>
      </div>
    </li>

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="./index.php">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!--(1) Admin Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#adminMenu" aria-expanded="false" aria-controls="adminMenu">
        <i class="fa fa-user menu-icon"></i>
        <span class="menu-title">Admin</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="adminMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./admin_insert.php">Add Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="./admin_view.php">View Admin</a></li></ul>
</div></li>

      <!--(2) user Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#userMenu" aria-expanded="false" aria-controls="userMenu">
        <i class="fa fa-user menu-icon"></i>
        <span class="menu-title">User</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="userMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./user_insert.php">Add user</a></li>
        <li class="nav-item"><a class="nav-link" href="./user_view.php">View user</a></li></ul>
</div></li>

     <!--(3) category Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#categoryMenu" aria-expanded="false" aria-controls="categoryMenu">
        <i class="fa fa-category menu-icon"></i>
        <span class="menu-title">category</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="categoryMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./category_insert.php">Add category</a></li>
        <li class="nav-item"><a class="nav-link" href="./category_view.php">View category</a></li></ul>
</div></li>

    <!--(4) technician Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tMenu" aria-expanded="false" aria-controls="tMenu">
        <i class="fa fa-t menu-icon"></i>
        <span class="menu-title">Technician</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="tMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./t_insert.php">Add Technician</a></li>
        <li class="nav-item"><a class="nav-link" href="./t_view.php">View Technician</a></li></ul>
</div></li>

   <!--(5) Service Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#serviceMenu" aria-expanded="false" aria-controls="serviceMenu">
        <i class="fa fa-service menu-icon"></i>
        <span class="menu-title">Service</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="serviceMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./s_insert.php">Add service</a></li>
        <li class="nav-item"><a class="nav-link" href="./s_view.php">View service</a></li></ul>
</div></li>

 <!--(6) Booking Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#BookingMenu" aria-expanded="false" aria-controls="BookingMenu">
        <i class="fa fa-Booking menu-icon"></i>
        <span class="menu-title">Booking</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="BookingMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./b_insert.php">Add Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="./b_view.php">View Booking</a></li></ul>
</div></li>



<!--(8) Review -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#reviewMenu" aria-expanded="false" aria-controls="reviewMenu">
        <i class="fa fa-review menu-icon"></i>
        <span class="menu-title">review</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="reviewMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./r_insert.php">Add review</a></li>
        <li class="nav-item"><a class="nav-link" href="./r_view.php">View review</a></li></ul>
</div></li>

<!--(8) role -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#roleMenu" aria-expanded="false" aria-controls="roleMenu">
        <i class="fa fa-role menu-icon"></i>
        <span class="menu-title">role</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="roleMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="./role_insert.php">Add role</a></li>
        <li class="nav-item"><a class="nav-link" href="./role_view.php">View role</a></li></ul>
</div></li>

</ul></nav>
