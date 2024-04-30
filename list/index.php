<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information</title>

    <style>
      body {
        font-family: sans-serif;
        padding: 0;
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
    <header>
      <div
        style="
          display: flex;
          align-items: center;
          justify-content: end;
          padding: 0px 10em 0px 10em;
          gap: 16px;
          height: 2.5em;
          cursor: pointer;
          background-color: #f4f4f4;
        "
      >
        <span> Đăng nhập </span>
        <span> Hệ thống cửa hàng </span>
        <span> English | <strong>Tiếng Việt</strong> </span>
      </div>

      <div
        style="
          display: flex;
          align-items: center;
          height: 4em;
          justify-content: space-between;
          background-color: white;
          border-bottom: #cccccc 1px solid;
          padding-left: 10em;
          padding-right: 10em;
        "
      >
        <div style="display: flex; gap: 2.5em; align-items: center">
          <img
            src="../assets/shark.svg"
            style="width: 3em; height: 3em; margin-right: 40px"
          />
          <strong>NỮ</strong>
          <strong>NAM</strong>
          <strong>TRẺ EM</strong>
          <strong>TRẺ SƠ SINH</strong>
        </div>

        <div style="display: flex; gap: 2.5em; align-items: center">
          <img src="../assets/magnifyingglass.svg" style="height: 2.5em" />
          <img src="../assets/person.svg" style="height: 2em" />
          <img src="../assets/heart.svg" style="height: 2em" />
          <img src="../assets/cart.svg" style="height: 2em" />
        </div>
      </div>
    </header>

    <div
      style="
        display: flex;
        flex-direction: column;
        height: 100vh;
        padding-left: 10em;
        padding-top: 1.5em;
        padding-right: 10em;
      "
    >
      <div style="display: flex; align-items: center; gap: 16px">
        <span style="color: gray; text-decoration: underline; font-size: 14px"
          >TRANG CHỦ UNIQLO</span
        >

        <span style="color: gray; text-decoration: underline; font-size: 14px"
          >/</span
        >

        <span style="color: gray; text-decoration: underline; font-size: 14px"
          >KẾT QUẢ TÌM KIẾM CHO ÁO THUN CỔ TRÒN
        </span>
      </div>

      <div style="display: flex; flex-direction: column; margin-top: 3em">
        <h3 style="">TÌM KIẾM KẾT QUẢ CHO</h3>
        <span style="font-size: 36px">Áo Thun Cổ Tròn</span>
      </div>

      <div
        style="
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-top: 32px;
          border-top: gray 1px solid;
          padding-top: 20px;
          padding-right: 40px;
        "
      >
        <div style="display: flex; flex-direction: column; gap: 24px">
          <span style="font-weight: bold">KẾT QUẢ</span>
          <span style="font-weight: 500; font-size: large">
            <?php
              echo count($products) ." SẢN PHẨM";
            ?>
          </span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px">
          <span style="font-weight: bold">SẮP XẾP THEO</span>

          <select
            style="
              border: black 1px solid;
              padding-left: 1em;
              padding-right: 1em;
              padding-top: 0.5em;
              padding-bottom: 0.5em;
              background-color: white;
            "
          >
            <option value="default">Mặc định</option>
            <option value="desc">Giá: Thấp đến cao</option>
            <option value="asc">Giá: Cao đến thấp</option>
          </select>
        </div>
      </div>

      <div
        style="
          display: grid;
          grid-template-columns: repeat(4, minmax(0, 1fr));
          height: 100%;
          margin-top: 60px;
          align-items: center;
          justify-content: center;
          grid-row-gap: 50px;
        "
      >
        <?php
          foreach ($products as $product) {
            $price = $product['price'];
            $formatted_price = number_format($price, 0, '.', '.');
            $id = $product['id'];

            echo "
            <a
              style='text-decoration: none; color: black'
              href='http://localhost/btl/web-programming/detail/index.php?id=$id'> 
              <div style='display: flex; flex-direction: column; width: 250px; height:500px; gap: 8px'>
                <img
                  style='width: 250px; height: 250px'
                  src='$product[primary_image]'
                />
    
                <div style='display: flex; align-items: center; gap: 6px'>
                  <div
                  style='width: 20px; height: 20px; background-color: #edeef2'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #3e3f44'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #2b2a2f'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #e8d5ce'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #d0c8c3'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #c0856e'
                  ></div>
                  <div
                    style='width: 20px; height: 20px; background-color: #cbbd80'
                  ></div>
                </div>
    
                <div
                  style='
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 12px;
                  '
                >
                  <span style='font-weight: bold; font-size: 14px; color: gray'
                    >NAM/NỮ</span
                  >
                  <span style='font-weight: bold; font-size: 14px; color: gray'
                    >XS-XXL</span
                  >
                </div>
      
                <span style='margin-top: 12px; font-weight: bold; font-size: 20px'>
                  $product[name]
                </span>
      
                <span style='font-size: 28px; font-weight: 600; color: black'
                  >$formatted_price VND</span
                >
                <span style='font-size: 18px; font-weight: 400; color: red'
                  >$product[descriptiondiscount]</span
                >
              </div>
            </a>
          ";
          }
        ?>
      </div>
    </div>
  </body>
</html>
