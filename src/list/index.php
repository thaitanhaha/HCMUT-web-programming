<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Information</title>

    <style>
      body {
        font-family: Arial, sans-serif;
        padding: 0;
        margin: 0;
        overflow-x: hidden;
      }
    </style>
  </head>

  <?php
      $servername= "localhost";
      $username= "root";
      $password= "";
      $dbname= "btl";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("". $conn->connect_error);
      }

      $collection_name = $_GET['name'];

      $sql = "SELECT * FROM collection WHERE name = '$collection_name'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();  

      $product_id = json_decode($row['product_id'], true);
      $ids = $product_id['ids'];
      $product_ids = implode(',', array_map('intval', $ids)); 

      $sql_products = "SELECT * FROM product WHERE id IN ($product_ids)";
      $result_products = $conn->query($sql_products);

      $products = array(); 

      if ($result_products->num_rows > 0) {
          while ($row_product = $result_products->fetch_assoc()) {
              $products[] = $row_product; 
          }
      }
  ?>

  <body>  
    <header class="header">
      <?php include '../utils/header.php'?>
    </header>

    <div style="display: flex; flex-direction: column; height: 100vh; padding-left: 10em; padding-top: 1.5em; padding-right: 10em;">
      <div style="display: flex; flex-direction: column;">
        <h4>TÌM KIẾM KẾT QUẢ CHO</h4>
        <span style="font-size: 24px">Áo Thun Cổ Tròn</span>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 32px; border-top: gray 1px solid; padding-top: 20px; padding-right: 40px;">
        <div style="display: flex; flex-direction: column; gap: 24px">
          <span style="font-weight: bold">KẾT QUẢ</span>
          <span style="font-weight: 500; font-size: large">
            <?php
              echo count($products) ." SẢN PHẨM";
            ?>
          </span>
        </div>
      </div>

      <div class="container-fluid" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4">
                    <a href="/detail/index.php?id=<?php echo $product['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="<?php echo $product['primary_image']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="font-size-14 text-gray">NAM/NỮ</span>
                                    <span class="font-size-14 text-gray">XS-XXL</span>
                                </div>
                                <h5 class="card-title mb-1"><?php echo $product['name']; ?></h5>
                                <p class="card-text mb-1"><?php echo number_format($product['price'], 0, '.', '.'); ?> VND</p>
                                <p class="card-text font-size-18 text-danger"><?php echo $product['descriptiondiscount']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
      </div>


    </div>
  </body>
</html>


