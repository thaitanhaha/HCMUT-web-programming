<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      font-family: sans-serif;
      padding: 0;
      overflow-x: hidden;
    }
    .fixed-width {
      width: 150px;
    }
    .fixed-width-b {
      width: 50px;
    }
  </style>
</head>
<body>
  <header>
    <?php include '../utils/admin_header.php'?>
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
    <h1>Sản phẩm</h1>
    <table class="table table-bordered align-middle">
      <thead style="text-align: center;">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Giá cả</th>
          <th scope="col">Giảm giá</th>
          <th scope="col">Mô tả giảm giá</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Sản phẩm tương tự</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody style="text-align: center;" id='productTable'></tbody>
    </table>
  </div>
  <div id='user-footer'class='footer mt-auto py-3 ' style="flex-direction: end;"></div>
  
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa sản phẩm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Bạn có chắc chắn muốn xóa sản phẩm này không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger" id="confirmDelete">Xác nhận xóa</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="modalId" value="">
                    <div class="mb-3">
                        <label for="modalTitleInput" class="form-label">Tên</label>
                        <textarea class="form-control" id="modalName" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Giá cả</label>
                        <textarea class="form-control" id="modalPrice" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Giảm giá</label>
                        <textarea class="form-control" id="modalDiscount" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Mô tả giảm giá</label>
                        <textarea class="form-control" id="modalDiscountDes" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Đường dẫn tới hình ảnh</label>
                        <textarea class="form-control" id="modalImage" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Các sản phẩm tương tự</label>
                        <textarea class="form-control" id="modalSimilar" rows="3"></textarea>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Lưu</button>
                </div>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script>
    function confirmDelete(id) {
      $('#deleteModal').modal('show');
      $('#confirmDelete').on('click', function() {
        remove(id);
      });
    }

    function confirmEdit(id, name, price, discount, discountdes, image, similar) {
        document.getElementById('modalId').value = id;
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalPrice').innerText = price;
        document.getElementById('modalDiscount').innerText = discount;
        document.getElementById('modalDiscountDes').innerText = discountdes;
        document.getElementById('modalImage').innerText = image;
        document.getElementById('modalSimilar').innerText = similar;

        $('#editModal').modal('show');
    }

    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        var productId = document.getElementById('modalId').value;
        var productName = document.getElementById('modalName').value;
        var productPrice = document.getElementById('modalPrice').value;
        var productDiscount = document.getElementById('modalDiscount').value;
        var productDiscountDes = document.getElementById('modalDiscountDes').value;
        var productImage = document.getElementById('modalImage').value;
        var productSimilar = document.getElementById('modalSimilar').value;

        const formData = new FormData();
        formData.append('action', 'update');
        formData.append('productId', productId);
        formData.append('productName', productName);
        formData.append('productPrice', productPrice);
        formData.append('productDiscount', productDiscount);
        formData.append('productDiscountDes', productDiscountDes);
        formData.append('productImage', productImage);
        formData.append('productSimilar', productSimilar);
        fetch('/management/update_product.php',{
            method : 'POST',
            body : formData
        })
        $('#editModal').modal('hide');
        window.location.reload();
    });

    function remove(id) {
      const formData = new FormData();
      formData.append('action', 'remove');
      formData.append('id', id);
      fetch('/management/update_product.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.log(data.error)
        }
    });
        $('#deleteModal').modal('hide');
        window.location.reload(true);
    }

    fetch(
      '/management/update_product.php',
      { method: 'GET' }
    )
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.error) {
        console.log(data.error)
      } else {
        let productTable = document.getElementById('productTable');
        data.forEach((item, index) => {
          let row = document.createElement('tr');
          let stt = document.createElement('th');
          stt.scope = 'row';
          stt.textContent = index + 1;

          let id = document.createElement('td');
          id.textContent = item.id;

          let name = document.createElement('td');
          name.textContent = item.name;
          name.className = 'fixed-width';
          name.style = 'text-align: center';

          let price = document.createElement('td');
          price.className = 'fixed-width-b';
          price.style = 'text-align: center';
          price.textContent = item.price;

          let percentdiscount = document.createElement('td');
          percentdiscount.className = 'fixed-width-b';
          percentdiscount.style = 'text-align: center';
          percentdiscount.textContent = item.percentdiscount;

          let descriptiondiscount = document.createElement('td');
          descriptiondiscount.className = 'fixed-width';
          descriptiondiscount.style = 'text-align: center';
          descriptiondiscount.textContent = item.descriptiondiscount;

          let primary_image = document.createElement('td');
          primary_image.style = 'text-align: center';
          primary_image.textContent = item.primary_image;

          let primaryImageCell = document.createElement('td');
            primaryImageCell.style.textAlign = 'center';

            let imageElement = document.createElement('img');
            imageElement.src = item.primary_image;
            imageElement.style.maxWidth = '100px';

            primaryImageCell.appendChild(imageElement);

          let similar_ids = document.createElement('td');
          similar_ids.className = 'fixed-width-b';
          similar_ids.style = 'text-align: center';
          similar_ids.textContent = item.similar_ids;

          let action = document.createElement('td');

          let remove = document.createElement('button');
          remove.className = 'btn btn-warning';
          remove.onclick = () => confirmDelete(item.id);
          remove.textContent = 'Xóa';

          let edit = document.createElement('button');
          edit.className = 'btn btn-primary';
          edit.onclick = () => confirmEdit(item.id, item.name, item.price, item.percentdiscount, item.descriptiondiscount, item.primary_image, item.similar_ids);
          edit.textContent = 'Sửa';

          action.appendChild(edit);
          action.appendChild(remove);
          row.appendChild(id);
          row.appendChild(name);
          row.appendChild(price);
          row.appendChild(percentdiscount);
          row.appendChild(descriptiondiscount);
          row.appendChild(primaryImageCell);
          row.appendChild(similar_ids);
          row.appendChild(action);
          productTable.appendChild(row);
        });
      }
    });
  </script>
</body>
</html>
