<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Collections</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      font-family: sans-serif;
      padding: 0;
      overflow-x: hidden;
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
    <h1>Bộ sưu tập</h1>
    <button type="button" class="btn btn-primary mb-3" style="width: 100px;" onclick="openAddModal()">
        Thêm
    </button>
    <table class="table table-bordered align-middle">
      <thead style="text-align: center;">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên bộ sưu tập</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Sản phẩm</th>
          <th scope="col">Hình ảnh từng sản phẩm</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody style="text-align: center;" id='collectionTable'></tbody>
    </table>
  </div>
  <div id='user-footer'class='footer mt-auto py-3 ' style="flex-direction: end;"></div>
  
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa bộ sưu tập</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Bạn có chắc chắn muốn xóa bộ sưu tập này không?
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa bộ sưu tập</h5>
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
                        <label for="modalDetailInput" class="form-label">Đường dẫn đến hình ảnh</label>
                        <textarea class="form-control" id="modalImage" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Các sản phẩm</label>
                        <textarea class="form-control" id="modalProducts" rows="5"></textarea>
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

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Thêm bộ sưu tập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                      <div class="mb-3">
                          <label for="modalTitleInput" class="form-label">Tên</label>
                          <textarea class="form-control" id="addModalName" rows="2"></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="modalDetailInput" class="form-label">Đường dẫn đến hình ảnh</label>
                          <textarea class="form-control" id="addModalImage" rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="modalDetailInput" class="form-label">Sản phẩm</label>
                          <textarea class="form-control" id="addModalProducts" rows="3">{  "ids": [      ]}</textarea>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="addBtn">Thêm</button>
                </div>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script>
    function openAddModal() {
      $('#addModal').modal('show');
    }

    function confirmDelete(id) {
      $('#deleteModal').modal('show');
      $('#confirmDelete').on('click', function() {
        remove(id);
      });
    }

    function confirmEdit(id, name, image, products) {
        document.getElementById('modalId').value = id;
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalImage').innerText = image;
        document.getElementById('modalProducts').innerText = products;

        $('#editModal').modal('show');
    }

    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        var collectionId = document.getElementById('modalId').value;
        var collectionName = document.getElementById('modalName').value;
        var collectionImage = document.getElementById('modalImage').value;
        var collectionProducts = document.getElementById('modalProducts').value;

        const formData = new FormData();
        formData.append('action', 'update');
        formData.append('collectionId', collectionId);
        formData.append('collectionName', collectionName);
        formData.append('collectionImage', collectionImage);
        formData.append('collectionProducts', collectionProducts);
        fetch('/management/update_collection.php',{
            method : 'POST',
            body : formData
        })
        $('#editModal').modal('hide');
        window.location.reload();
    });

    document.getElementById('addBtn').addEventListener('click', function() {
        var collectionName = document.getElementById('addModalName').value;
        var collectionImage = document.getElementById('addModalImage').value;
        var collectionProducts = document.getElementById('addModalProducts').value;

        const formData = new FormData();
        formData.append('action', 'add');
        formData.append('collectionName', collectionName);
        formData.append('collectionImage', collectionImage);
        formData.append('collectionProducts', collectionProducts);
        fetch('/management/update_collection.php',{
            method : 'POST',
            body : formData
        })
        $('#addModal').modal('hide');
        window.location.reload();
    });

    function remove(id) {
        const formData = new FormData();
        formData.append('action', 'remove');
        formData.append('id', id);
        fetch('/management/update_collection.php', {
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

    let images = {};

    fetch('/management/update_product.php', { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                images[item.id] = item.primary_image;
            });

            fetch('/management/update_collection.php', { method: 'GET' })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.log(data.error);
                    } else {
                        let collectionTable = document.getElementById('collectionTable');
                        data.forEach((item, index) => {
                            let product_ids = JSON.parse(item.product_id).ids;
                            let temp = item.product_id;
                            if (product_ids.length != 0) {
                                product_ids.forEach((pro_id, subIndex) => {
                                    let row = document.createElement('tr');
                                    let action = document.createElement('td');
                                    if (subIndex === 0) {

                                        let id = document.createElement('td');
                                        id.textContent = item.id;
                                        row.appendChild(id);

                                        let name = document.createElement('td');
                                        name.textContent = item.name;
                                        name.style = 'text-align: center';
                                        row.appendChild(name);

                                        let primaryImageCell = document.createElement('td');
                                        primaryImageCell.style.textAlign = 'center';

                                        let imageElement = document.createElement('img');
                                        imageElement.src = item.primary_image;
                                        imageElement.style.maxWidth = '200px';

                                        primaryImageCell.appendChild(imageElement);
                                        row.appendChild(primaryImageCell);

                                        let remove = document.createElement('button');
                                        remove.className = 'btn btn-warning';
                                        remove.onclick = () => confirmDelete(item.id);
                                        remove.textContent = 'Xóa';

                                        let edit = document.createElement('button');
                                        edit.className = 'btn btn-primary';
                                        edit.onclick = () => confirmEdit(item.id, item.name, item.primary_image, temp);
                                        edit.textContent = 'Sửa';

                                        action.appendChild(edit);
                                        action.appendChild(remove);
                                    } else {
                                        let id = document.createElement('td');
                                        id.textContent = '';
                                        row.appendChild(id);

                                        let name = document.createElement('td');
                                        name.textContent = '';
                                        name.style = 'text-align: center';
                                        row.appendChild(name);
                                        
                                        let primary_image = document.createElement('td');
                                        row.appendChild(primary_image);
                                    }

                                    let product_id = document.createElement('td');
                                    product_id.style = 'text-align: center';
                                    product_id.textContent = pro_id;

                                    let primary_image = document.createElement('td');
                                    primary_image.style = 'text-align: center';
                                    primary_image.textContent = images[pro_id];

                                    let primaryImageCell = document.createElement('td');
                                    primaryImageCell.style.textAlign = 'center';

                                    let imageElement = document.createElement('img');
                                    imageElement.src = images[pro_id];
                                    imageElement.style.maxWidth = '100px';

                                    primaryImageCell.appendChild(imageElement);

                                    row.appendChild(product_id);
                                    row.appendChild(primaryImageCell);

                                    row.appendChild(action);

                                    collectionTable.appendChild(row);
                                });
                            }
                            else {
                                let row = document.createElement('tr');
                                let action = document.createElement('td');

                                let id = document.createElement('td');
                                id.textContent = item.id;
                                row.appendChild(id);

                                let name = document.createElement('td');
                                name.textContent = item.name;
                                name.style = 'text-align: center';
                                row.appendChild(name);

                                let primaryImageCell = document.createElement('td');
                                primaryImageCell.style.textAlign = 'center';

                                let imageElement = document.createElement('img');
                                imageElement.src = item.primary_image;
                                imageElement.style.maxWidth = '200px';

                                primaryImageCell.appendChild(imageElement);
                                row.appendChild(primaryImageCell);

                                let remove = document.createElement('button');
                                remove.className = 'btn btn-warning';
                                remove.onclick = () => confirmDelete(item.id);
                                remove.textContent = 'Xóa';

                                let edit = document.createElement('button');
                                edit.className = 'btn btn-primary';
                                edit.onclick = () => confirmEdit(item.id, item.name, item.primary_image, temp);
                                edit.textContent = 'Sửa';

                                action.appendChild(edit);
                                action.appendChild(remove);

                                let empty = document.createElement('td');
                                row.appendChild(empty);
                                let empty1 = document.createElement('td');
                                row.appendChild(empty1);
                                
                                row.appendChild(action);

                                collectionTable.appendChild(row);
                            }
                            
                        });
                    }
                });
        });

    
    </script>
</body>
</html>
