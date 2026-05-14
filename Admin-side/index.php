<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>

<!-- partial -->
<head>
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-panel {
      width: 100% !important;
      margin-left: 0 !important;
      padding: 20px;
    }

    .page-title {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #333;
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h4 {
      font-weight: 600;
      margin-bottom: 10px;
      color: #fff;
    }

    .card h2 {
      font-weight: 700;
      font-size: 28px;
    }

    .card p {
      font-size: 14px;
      opacity: 0.85;
    }

    .bg-primary { background-color: #3b82f6 !important; }
    .bg-success { background-color: #10b981 !important; }
    .bg-warning { background-color: #f59e0b !important; }
    .bg-danger  { background-color: #ef4444 !important; }

    .list-group-item {
      border: none;
      border-bottom: 1px solid #eee;
      padding: 12px 0;
      font-weight: 500;
    }

    .badge {
      padding: 5px 10px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-success { background-color: #10b981; color: #fff; }
    .badge-warning { background-color: #fbbf24; color: #fff; }
    .badge-danger { background-color: #ef4444; color: #fff; }

    table {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    table th, table td {
      vertical-align: middle !important;
    }
  </style>
</head>

<div class="main-panel">
  <div class="content-wrapper">

    <div class="page-header">
      <h3 class="page-title">Admin Dashboard</h3>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h4>Users</h4>
            <h2>54,000</h2>
            <p>2.7% Increase</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h4>Sales</h4>
            <h2>$56,000</h2>
            <p>10% Growth</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h4>Orders</h4>
            <h2>3,500</h2>
            <p>New Orders</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <h4>Pending</h4>
            <h2>750</h2>
            <p>Need Review</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sales Overview & Quick Stats -->
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sales Overview</h4>
            <canvas id="sales-chart" style="height: 300px;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Quick Stats</h4>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between">Total Users <span>54,000</span></li>
              <li class="list-group-item d-flex justify-content-between">Total Sales <span>$56,000</span></li>
              <li class="list-group-item d-flex justify-content-between">Orders <span>3,500</span></li>
              <li class="list-group-item d-flex justify-content-between">Pending <span>750</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Orders</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John Smith</td>
                    <td>#ORD001</td>
                    <td><span class="badge badge-success">Delivered</span></td>
                    <td>$120</td>
                  </tr>
                  <tr>
                    <td>Mary Jane</td>
                    <td>#ORD002</td>
                    <td><span class="badge badge-warning">Processing</span></td>
                    <td>$350</td>
                  </tr>
                  <tr>
                    <td>Michael</td>
                    <td>#ORD003</td>
                    <td><span class="badge badge-danger">Pending</span></td>
                    <td>$220</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
include('./include/footer.php');
?>