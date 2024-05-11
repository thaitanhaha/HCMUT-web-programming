<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "../utils/admin_header.php" ?>
  <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "btl";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sqlProcduct = "SELECT * FROM product";
      $resultProduct = $conn->query($sqlProcduct);

      $sqlUser = "SELECT * FROM user";
      $resultUser = $conn->query($sqlUser);
      
      session_start();

      // Don't allow access if the user is not admin
      if (!isset($_SESSION['admin_session']))
      {
          header('Location: /admin/signin.php');
      }
  ?>

  <div class="container mt-5">
    <h1 class="mb-4">HỆ THỐNG</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Quản lý hệ thống</h4>
            <a href="/management/users.php" class="card-link">Thành viên</a>
            <br>
            <a href="/management/news.php" class="card-link">Tin tức</a>
            <br>
            <a href="/management/products.php" class="card-link">Sản phẩm</a>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Hệ thống</h1>
            <div class="row">
              <div class="col">
                <h2>Tổng sản phẩm</h2>
                <span><?php echo $resultProduct->num_rows; ?> sản phẩm</span>
              </div>
              <div class="col">
                <h2>Tổng thành viên</h2>
                <span><?php echo $resultUser->num_rows; ?> thành viên</span>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
