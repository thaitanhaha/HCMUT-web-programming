<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users</title>
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
    <h1>Thành viên</h1>
    <table class="table table-bordered align-middle">
      <thead style="text-align: center;">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Họ và tên</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Email</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody style="text-align: center;" id='userTable'></tbody>
    </table>
  </div>
  <div id='user-footer'class='footer mt-auto py-3 ' style="flex-direction: end;"></div>
  
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa thành viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Bạn có chắc chắn muốn xóa thành viên này không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger" id="confirmDelete">Xác nhận xóa</button>
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

    function remove(id) {
      const formData = new FormData();
      formData.append('action', 'remove');
      formData.append('id', id);
      fetch('/management/update_user.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.log(data.error)
        }
        window.location.reload(true);
      });
    }

    fetch(
      '/management/update_user.php',
      { method: 'GET' }
    )
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.error) {
        console.log(data.error)
      } else {
        let userTable = document.getElementById('userTable');
        data.forEach((item, index) => {
          let row = document.createElement('tr');
          let stt = document.createElement('th');
          stt.scope = 'row';
          stt.textContent = index + 1;
          let id = document.createElement('td');
          id.textContent = item.id;

          let fullname = document.createElement('td');
          fullname.textContent = item.fullname;
          fullname.style = 'text-align: center';

          let gender = document.createElement('td');
          gender.style = 'text-align: center';
          gender.textContent = item.gender;

          let email = document.createElement('td');
          email.style = 'text-align: center';
          email.textContent = item.email;

          let action = document.createElement('td');
          action.className = 'd-flex grid justify-content-around';

          let minus = document.createElement('button');
          minus.className = 'btn btn-warning';
          minus.onclick = () => confirmDelete(item.id);
          minus.textContent = 'Xóa';

          action.appendChild(minus);
          row.appendChild(id);
          row.appendChild(fullname);
          row.appendChild(gender);
          row.appendChild(email);
          row.appendChild(action);
          userTable.appendChild(row);
        });
      }
    });
  </script>
</body>
</html>
