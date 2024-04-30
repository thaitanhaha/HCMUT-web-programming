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

  <style></style>

    <?php
      $servername= "localhost";
      $username= "root";
      $password= "";
      $dbname= "btl";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("". $conn->connect_error);
      }

      $idproduct = $_GET['id'];

      $sql = "SELECT * FROM product WHERE id = $idproduct";
      $result = $conn->query($sql);
      $rowproduct = $result->fetch_assoc();


      $sql1 = "SELECT * FROM image WHERE id_product = $rowproduct[id]";

      $result1 = $conn->query($sql1);
      $rowImage = $result1->fetch_assoc();

      $imagepanel = json_decode($rowImage['src_images'], true);
  
      


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
        padding-left: 10em;
        padding-top: 1.5em;
        padding-right: 10em;
        overflow-y: auto;
      "
    >
      <div
        style="
          display: flex;
          align-items: center;
          gap: 16px;
          margin-bottom: 40px;
        "
      >
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

      <div
        style="display: flex; gap: 2em; width: 100%; height: 70em;"
      >
        <div
          style="
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 2em;
            width: 55%;
            height: 100%;
          "
        >

        <div style="display: flex; width: 100%; gap: 2em;">


          <!-- Left pane -->
          <div id="imagePanel" style="display: grid; grid-template-columns: 50px 50px; grid-auto-rows: 50px; gap:16px;">

            <?php
              foreach ($imagepanel as $key => $value) {
                echo "<img src='$value' 
                            style='width: 60px; height: 60px; border: 1px solid black'
                            onClick='changeImage(\"$value\")'></img>";
              }
            ?>

            <script>
              function changeImage(source) {
                // Get the reference to the image element in the selectedImagePane
                var primaryImage = document.getElementById('primaryImage');
                // Change the source of the image to the clicked thumbnail
                primaryImage.src = source;
              }
            </script>

          </div>


          <!-- Middle pane -->
          <div style="display: flex; width: 100%; height: 30em;">
            <?php
              echo "<img id='primaryImage' src='$rowproduct[primary_image]' style='width: 100%; height: 100%'></img>";
            ?>
          </div>

        </div>


        <div style="display: flex; flex-direction: column; height: 50em; width: 100%; overflow-x: hidden; overflow-y: auto; gap:4em; padding-bottom: 2em; padding-top: 1em;">


        <div style="display: flex; flex-direction: column; width: 100%; gap:8px;">
          <div style="display: flex; align-items: baseline; justify-content: space-between;">
              <span style="font-size: 24px; font-weight: 600;">ÁO BRA TOP 100 ĐIỂM</span>
              <span style="color: gray;">26/04/2024</span>
          </div>
          <span style="font-size: 18px; margin-top: 20px;">Kích cỡ đã mua: S</span>
          <span style="font-size: 18px;">Quần áo có vừa không: Đúng với kích thước</span>
          <p style="font-size: 16px; letter-spacing: 1px;">
            Lần đầu mua kiểu áo này ở Uniqlo, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
          </p>
          <span style="color: gray; font-size: 14px;">· Nữ
             · 25 đến 34 tuổi
             · Chiều cao: 161 - 165cm
             · Cân nặng: 51 - 55kg
             · Cỡ giày: EU36
             · Bắc Ninh</span>
        </div>

        <div style="display: flex; flex-direction: column; width: 100%; gap:8px;">
          <div style="display: flex; align-items: baseline; justify-content: space-between;">
              <span style="font-size: 24px; font-weight: 600;">ÁO BRA TOP 100 ĐIỂM</span>
              <span style="color: gray;">26/04/2024</span>
          </div>
          <span style="font-size: 18px; margin-top: 20px;">Kích cỡ đã mua: S</span>
          <span style="font-size: 18px;">Quần áo có vừa không: Đúng với kích thước</span>
          <p style="font-size: 16px; letter-spacing: 1px;">
            Lần đầu mua kiểu áo này ở Uniqlo, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
          </p>
          <span style="color: gray; font-size: 14px;">· Nữ
             · 25 đến 34 tuổi
             · Chiều cao: 161 - 165cm
             · Cân nặng: 51 - 55kg
             · Cỡ giày: EU36
             · Bắc Ninh</span>
        </div>

        <div style="display: flex; flex-direction: column; width: 100%; gap:8px;">
          <div style="display: flex; align-items: baseline; justify-content: space-between;">
              <span style="font-size: 24px; font-weight: 600;">ÁO BRA TOP 100 ĐIỂM</span>
              <span style="color: gray;">26/04/2024</span>
          </div>
          <span style="font-size: 18px; margin-top: 20px;">Kích cỡ đã mua: S</span>
          <span style="font-size: 18px;">Quần áo có vừa không: Đúng với kích thước</span>
          <p style="font-size: 16px; letter-spacing: 1px;">
            Lần đầu mua kiểu áo này ở Uniqlo, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
          </p>
          <span style="color: gray; font-size: 14px;">· Nữ
             · 25 đến 34 tuổi
             · Chiều cao: 161 - 165cm
             · Cân nặng: 51 - 55kg
             · Cỡ giày: EU36
             · Bắc Ninh</span>
        </div>

      </div>

        
        </div>

        <div
          style="
            display: flex;
            flex-direction: column;
            margin-left: 20px;
            width: 35%;
            height: 100%;
            gap: 0.5em;
          "
          >
        <span style="font-size: 50px; margin-top: 10px; font-weight: bold;">
          <?php
            echo "<strong>$rowproduct[name]</strong>"
          ?>
        </span>
        <span style="text-decoration: line-through; font-size: 20px; font-weight: bold;">
          <?php
            $price = $rowproduct['price'];
            $formatted_price = number_format($price, 0, '.', '.');
            echo "<strong>$formatted_price VND</strong>";
          ?>
        </span>
        <span style="font-size: 40px; font-weight: bold; color: red;">
          <?php
            $price = $rowproduct['price'];
            $percent = $rowproduct['percentdiscount'];
            $discount = $price * $percent / 100;
            $newprice = $price - ($price * $percent /100);
            $final_price = floor($newprice);
            $formatted_price = number_format($final_price, 0, '.', '.');
            echo "<strong>$formatted_price VND</strong>";
          ?>
        </span>

        <span style="font-size: 20px; color: red; font-weight: 500; margin-top: 8px; width: 16em;">
          <?php
            echo "<strong>$rowproduct[descriptiondiscount]</strong>";
          ?>
        </span>

        <div style="width: 100%; background-color: #DADADA; height: 1px; margin-top: 20px; margin-bottom: 20px;"></div>

        <span id="colorName" style="font-weight: bold; font-size: 16px;">MÀU SẮC: 00 WHITE</span>
        <div style="display: flex; align-items: center; gap: 8px">
          <?php
            $colorpanel = json_decode($rowImage['src_colors'], true);
            foreach ($colorpanel as $key => $value) {
              echo "<img src='$value' 
                          style='width: 60px; height: 60px; border: 1px solid black'
                          onClick='updatePrimaryImage(\"$value\" , \"$key\")'></img>";
            }
          ?>
         <script>
              function updatePrimaryImage(source, name) {
                var primaryImage = document.getElementById('primaryImage');
                var colorName = document.getElementById('colorName');

                primaryImage.src = source;
                colorName.innerHTML = name;
              }
          </script>
        </div>


        <span id="sizeName" style="font-weight: bold; font-size: 16px; margin-top: 16px;">KÍCH CỠ: S</span>
        <div style="display: flex; align-items: center; gap: 12px">
          <?php
              $sizes = array("XS", "S", "M", "L", "XL", "XXL");
              foreach ($sizes as $size) {
                echo "<div style='display: flex; align-items: center; justify-content: center; font-size: 20px; width: 50px; height: 50px; border: 1px black solid' onClick='updateSizename(\"$size\")'>";
                echo $size; 
                echo '</div>';
              }
          ?>
          <script>
              function updateSizename(size) {
                var sizeName = document.getElementById('sizeName');

                sizeName.innerHTML = "KÍCH CỠ: " + size;
              }
          </script>
        </div>


        <span style="font-weight: bold; font-size: 16px; margin-top: 16px;">SỐ LƯỢNG</span>
        <select style="border: 1px black solid; width: 10em; height: 3em; padding-left: 12px;  background-color: white;">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>


        <button style="width: 100%; background-color: red; padding-top: 12px; padding-bottom: 12px; margin-top: 16px;">
          <span style="font-size: 20px; font-weight: 600; color: white;">THÊM VÀO GIỎ HÀNG</span>
        </button>


      </div>

      

      </div>

      
      <span style="font-weight: 600; font-size: 22px; margin-top: 2em; margin-bottom: 0.5em;">Cách phối đồ chuẩn</span>
      <div style="display: flex; align-items: center;width: 100%; height: 25em; gap:2.5em">
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
      </div>

      <span style="font-weight: 700; font-size: 22px; margin-top: 4em;">Gợi ý phối đồ từ StyleHint</span>
      <span style="font-weight: 500; font-size: 16px; margin-top: 4px; margin-bottom: 0.5em;">Gợi ý phối đồ từ cộng đồng quốc tế</span>
      <div style="display: flex; align-items: center; height: 25em; gap:2.5em">
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
        <img style="height: 100%;" src="https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031107465_official_styling_120018812_c-600-800"/>
      </div>

      <span style="display: flex; width: 100%; align-items: center; justify-content: center; font-weight: 700; font-size: 28px; margin-top: 4em; margin-bottom: 0.5em;">
        SẢN PHẨM ĐƯỢC QUAN TÂM
      </span>
      <a>
      <div style="display: flex; align-items: center; gap:2.5em;">
        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>


      </div>
      </a>


      <span style="display: flex; width: 100%; align-items: center; justify-content: center; font-weight: 700; font-size: 28px; margin-top: 4em; margin-bottom: 0.5em;">
        SẢN PHẨM THƯỜNG ĐƯỢC MUA KÈM
      </span>
      <div style="display: flex; align-items: center; gap:16px;">
            <?php
              $similar_ids = json_decode($rowproduct['similar_ids'], true);
              $ids = $similar_ids['ids'];
              for ($i = 0; $i < count($ids); $i++) {
                $similar_id = $ids[$i];


                $sql = "SELECT * FROM product WHERE id = $similar_id";
                $result = $conn->query($sql);
                $rowproduct = $result->fetch_assoc();

                $price = $rowproduct['price'];
                $formatted_price = number_format($price, 0, '.', '.');

                echo "
                  <a style='text-decoration: none' href='http://localhost/btl/web-programming/detail/?id=$rowproduct[id]'>
                    <div style='display: flex; flex-direction: column; gap:1em; height:40em;'>
                      <img style='width: 20em; height:20em;' src='$rowproduct[primary_image]'></img>
                      <div style='display: flex; align-items: center; gap:6px'>
                        <div style='width: 16px; height: 16px; background-color: green; border: 1px solid black;'></div>
                        <div style='width: 16px; height: 16px; background-color: blue; border: 1px solid black;'></div>
                        <div style='width: 16px; height: 16px; background-color: yellow; border: 1px solid black;'></div>
                        <div style='width: 16px; height: 16px; background-color: pink; border: 1px solid black;'></div>
                      </div>
            
                      <div style='display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;'>
                        <span style='color: gray; font-weight: 600;'>NAM / NỮ</span>
                        <span style='color: gray; font-weight: 600;'>XS-XXL</span>
                      </div>
            
                      <span style='font-weight: 800; font-size: 20px; color:black'>$rowproduct[name]</span>
                      <span style='font-weight: 600; font-size: 16px; color:gray'>$formatted_price VND</span>
                    </div>
                  </a>
                ";
              }
            ?>
      </div>

      <!-- <a>
      <div style="display: flex; align-items: center; gap:2.5em;">
        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>

        <div style="display: flex; flex-direction: column; gap:1em; width: 25%;">
          <img src="https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466775/item/vngoods_63_466775.jpg"></img>
          <div style="display: flex; align-items: center; gap:6px">
            <div style="width: 16px; height: 16px; background-color: green; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: blue; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: yellow; border: 1px solid black;"></div>
            <div style="width: 16px; height: 16px; background-color: pink; border: 1px solid black;"></div>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5em;">
            <span style="color: gray; font-weight: 600;">NAM</span>
            <span style="color: gray; font-weight: 600;">XS-XXL</span>
          </div>

          <span style="font-weight: 800; font-size: 20px;">Áo Thun Vải Slub Cotton Cổ Tròn Ngắn Tay</span>
          <span style="font-weight: 600; font-size: 16px;">391.000 VND</span>

        </div>


      </div>
      </a> -->


    </div>
  </body>
</html>
