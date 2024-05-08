<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniShark</title>

    <style>
      body {
        font-family: sans-serif;
        padding: 0;
        overflow-x: hidden;
      }
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
      if ($rowImage) {
        $imagepanel = json_decode($rowImage['src_images'], true);
        $colorpanel = json_decode($rowImage['src_colors'], true);
        $imageStyle = json_decode($rowImage['src_styles'], true);
      }
      session_start();
      $_SESSION['visited'] = $_SERVER['REQUEST_URI'];
    ?>

  <body>
    <header>
      <?php include '../utils/header.php'?>
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
          >TRANG CHỦ UNISHARK</span
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
              if (isset($imagepanel)) {
                foreach ($imagepanel as $key => $value) {
                  echo "<img src='$value' 
                              style='width: 60px; height: 60px; border: 1px solid black'
                              onClick='changeImage(\"$value\")'></img>";
                }
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
            Lần đầu mua kiểu áo này ở UniShark, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
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
            Lần đầu mua kiểu áo này ở UniShark, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
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
            Lần đầu mua kiểu áo này ở UniShark, mặc một lần mà mê say đắm, dễ chịu thoải mái cảm giác cơ thể mình được nâng niu vô cùng. Dễ phối đồ, không cần lo tìm áo trong hay miếng dán phù hợp. Thiết kế 2 in 1 siêu đỉnh, tiếc là không mua sớm hơn ạ.
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
            if (isset($colorpanel)){
              foreach ($colorpanel as $key => $value) {
                echo "<img src='$value' 
                            style='width: 60px; height: 60px; border: 1px solid black'
                            onClick='updatePrimaryImage(\"$value\" , \"$key\")'></img>";
              }
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


        <form method="POST" action="/cart/manage.php" id='cart'>
        <span style="font-weight: bold; font-size: 16px; margin-top: 16px;">SỐ LƯỢNG</span>
        <select id="quantity" name="quantity" style="border: 1px black solid; width: 10em; height: 3em; padding-left: 12px;  background-color: white;">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
          <input hidden name="action" value="add">
          <input hidden name="id" value="<?php echo $rowproduct['id']?>"> 
          <button style="width: 100%; background-color: red; padding-top: 12px; padding-bottom: 12px; margin-top: 16px;">
           <span style="font-size: 20px; font-weight: 600; color: white;" onclick="addingtoCart()">THÊM VÀO GIỎ HÀNG</span>
          </button>
        </form>
      </div>
      </div>

      
      <span style="font-weight: 700; font-size: 22px; margin-top: 4em;">Gợi ý phối đồ từ StyleHint</span>
      <span style="font-weight: 500; font-size: 16px; margin-top: 4px; margin-bottom: 0.5em;">Gợi ý phối đồ từ cộng đồng quốc tế</span>
      <div style="display: flex; align-items: center; height: 25em; gap:2.5em">
        <?php
          if (isset($imageStyle)) {
            foreach ($imageStyle as $key => $value) {
              echo "<img style='height: 100%; width:25%;' src='$value'></img>";
            }
          }
        ?>
      </div>

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
    </div>
  </body>
</html>
<div id="modal" class="modal" hidden >
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id='modal-paragraph'> </p>
  </div>
</div>
<script>
    var modal = document.getElementsByClassName('modal')[0];
    var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    async function addingtoCart(){
      event.preventDefault();
      const cartForm = document.getElementById('cart');
      const action = cartForm.action.value;
      const id = cartForm.id.value;
      const data = new FormData(cartForm);
      await fetch('/cart/manage.php', {
        redirect : 'error',
        method: 'POST',
        body: data
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById('modal-paragraph').innerHTML = 'Thêm vào giỏ hàng thành công';
          modal.style.display = "block";
        } else {
          document.getElementById('modal-paragraph').innerHTML = 'Bạn cần đăng nhập để thêm vào giỏ hàng';
          modal.style.display = "block";
          window.onclick = function(event) {
            if (event.target == modal) {
              window.location.href = '/user/signin.php'
            }
          }
        }
        return;
      })
      .catch(error =>{
        document.getElementById('modal-paragraph').innerHTML = 'Thêm vào giỏ hàng thất bại';
        modal.style.display = "block";
      })
      return;
    }
</script>