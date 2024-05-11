<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      body {
        font-family: sans-serif;
        padding: 0;
        overflow-x: hidden;
      }
    </style>
  </head>

  <style>
    
  </style>
    <?php
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "btl";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
            die('Connection failed: ' . $conn->connect_error);
        }
        session_start();
        if (! isset($_SESSION['id']))
        {
            header('Location: /user/signin.php');
        }
    ?>
  <body>
    <header>
      <?php include '../utils/header.php'?>
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
      <h1>GIỎ HÀNG</h1>

      <div class="m-0 p-0 mt-3 mb-3" style="margin: 10px">
        <button class="btn btn-danger" onclick="clearCart()">Xóa tất cả</button>
        <button class="btn btn-primary" onclick="window.location.href='/homepage/'">Tiếp tục mua hàng</button>
      </div>
      <table class="table table-bordered align-middle">
        <thead style="text-align: center;">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody style="text-align: center;" id='cartTable'>
          

 
        </tbody>
      </table>
    </div>
    <div id= 'cart-footer'class='footer mt-auto py-3 ' style="flex-direction: end;">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha3-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    function formatCost(cost) {
        // Convert cost to string
        let costStr = cost.toString();

        // Split the string into integer and fractional parts
        let parts = costStr.split('.');

        // Add dot delimiter every three digits in the integer part
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Join the integer and fractional parts back together
        return parts.join('.');
    }
    function add(id){
        event.preventDefault();
        const formData = new FormData();
        formData.append('action', 'add');
        formData.append('id', id);
        formData.append('quantity', 1);
        fetch('/cart/manage.php',{
            method : 'POST',
            body : formData
        })
        // .then(response => console.log(response))
        .then(response => response.json())
        .then(data => {
            if (data.error){
                console.log(data.error)
            }
            window.location.reload(true);
        }).catch(error => console.log(error))
    }
    function remove(id){
        event.preventDefault();
        const formData = new FormData();
        formData.append('action', 'remove');
        formData.append('id', id);
        formData.append('quantity', 1);
        fetch('/cart/manage.php',{
            method : 'POST',
            body : formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.error){
                console.log(data.error)
            }
            window.location.reload(true);
        })
    }

    function destroy(id){
        event.preventDefault();
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);
        fetch('/cart/manage.php',{
            method : 'POST',
            body : fromData
        })
        .then(response => response.json())
        .then(data => {
            if (data.error){
                console.log(data.error)
            }
            window.location.reload(true);
        })
    }
    function clearCart(){
        event.preventDefault();
        const formData = new FormData();
        formData.append('action', 'clear');
        fetch('/cart/manage.php',{
            method : 'POST',
            body : formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.error){
                console.log(data.error)
            }
            window.location.reload(true);
        })
    }
    var total = 0;
    fetch(
        '/cart/manage.php',
        {method : 'GET'}
    )
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.error){
            console.log(data.error)
        }
        else {
          let cartTable = document.getElementById('cartTable');
          let total = 0;
          data.forEach((item, index) => {
              total += item.cost;
              let row = document.createElement('tr');
              let stt = document.createElement('th');
              stt.scope = 'row';
              stt.textContent = index + 1;
              let name = document.createElement('td');
              name.textContent = item.name;
              let quantity = document.createElement('td');
              quantity.textContent = item.quantity;
              quantity.style = 'text-align: center';
              let cost = document.createElement('td');
              cost.style = 'text-align: center';
              cost.textContent = formatCost(item.cost);
              let action = document.createElement('td');
              action.className = 'd-flex grid justify-content-around';
              
              let plus = document.createElement('button');
              plus.className = 'btn btn-success col-3';
              plus.onclick = () => add(item.id);
              plus.textContent = '+';

              let minus = document.createElement('button');
              minus.className = 'btn btn-warning col-3';
              minus.onclick = () => remove(item.id);
              minus.textContent = '-';

              let del = document.createElement('button');
              del.className = 'btn btn-danger col-4';
              del.onclick = () => destroy(item.id);
              del.textContent = 'Xóa';
              
              action.appendChild(plus);
              action.appendChild(minus);
              action.appendChild(del);
              row.appendChild(stt);
              row.appendChild(name);
              row.appendChild(quantity);
              row.appendChild(cost);
              row.appendChild(action);
              cartTable.appendChild(row);
          });

          let totalRow = document.createElement('tr');

          let totalCostCell = document.createElement('td');
          totalCostCell.style = 'text-align: center;';
          totalCostCell.setAttribute('colspan', '3');
          totalCostCell.innerHTML = '<strong>Tổng cộng</strong>';
          totalRow.appendChild(totalCostCell);

          let totalValueCell = document.createElement('td');
          totalValueCell.style = 'text-align: center;';
          totalValueCell.setAttribute('colspan', '1');
          totalValueCell.textContent = formatCost(total);
          totalRow.appendChild(totalValueCell);

          let emptyCell = document.createElement('td');
          emptyCell.setAttribute('colspan', '1');
          emptyCell.textContent = "";
          totalRow.appendChild(emptyCell);

          cartTable.appendChild(totalRow);
        }
})
</script>
