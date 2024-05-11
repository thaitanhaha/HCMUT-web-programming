<!DOCTYPE html>

<html lang="en">
  <header>
      <?php include "../utils/admin_header.php" ?>
  </header>

  <style>
    body {
      height: 100%;
      width: 100%;
      overflow-x: hidden;
      padding: 0;
      margin: 0;
      font-family: Arial, sans-serif;
    }
  </style>

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

  <body>
    <div
      style="display: flex; flex-direction: column; padding: 2em 10em 0px 10em"
    >
      <h1>HỆ THỐNG</h1>

      <div style="display: flex; gap: 10em; margin-top: 4em">
        <div style="display: flex; flex-direction: column; width: 200px; gap: 12px">
          <h4>Quản lý hệ thống</h4>
          <a href="/management/news.php" style="margin-left: 1em">Tin tức</a>
        </div>

        <div
          style="
            display: flex;
            flex-direction: column;
            border: 1px #e0e0e0 solid;
            width: 100%;
            padding: 12px 32px 32px 32px;
          "
        >
          <h1>Hệ thống</h1>

          <div style="display: flex; gap: 10em">
            <div style="display: flex; flex-direction: column">
              <h2>Tổng sản phẩm</h2>
              <?php
                  echo "<span style='margin-top: -12px'>". $resultProduct->num_rows . " sản phẩm</span>"
              ?>
            </div>

            <div style="display: flex; flex-direction: column; gap: 24px">
              <div style="display: flex; flex-direction: column">
                <h2>Tổng thành viên</h2>
                <?php
                  echo "<span style='margin-top: -12px'>". $resultUser->num_rows . " thành viên</span>"
                  ?>
              </div>
            </div>
          </div>

          <div
            style="
              width: 100%;
              height: 1px;
              background-color: #e0e0e0;
              margin-top: 2em;
              margin-bottom: 2em;
            "
          ></div>
        </div>
      </div>
    </div>
  </body>
</html>
