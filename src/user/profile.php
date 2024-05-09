<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /user/signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }
    </style>
</head>

<body>
    <header>
        <?php include "../utils/header.php" ?>
    </header>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "btl";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $username = $_SESSION['username'];
      $sql = "SELECT * FROM user WHERE usrname='$username'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $fullname = $row['fullname'];
          $email = $row['email'];
          $gender = $row['gender'];
          $genderString = ($gender == 'M') ? 'Nam' : 'Nữ';
      } else {
          echo "No user found with the given username.";
      }

      $conn->close();
    ?>

    <div class="container py-5">
        <h1 class="mb-5">HỒ SƠ</h1>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Thông tin cá nhân</h3>
                        <div class="row mb-3">
                            <div class="col">
                                <h5>Họ và Tên</h5>
                                <p><?php echo $fullname; ?></p>
                            </div>
                            <div class="col">
                                <h5>Địa chỉ email</h5>
                                <p><?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Tài khoản</h5>
                                <p><?php echo $_SESSION['username'] ?></p>
                            </div>
                            <div class="col">
                                <h5>Giới tính</h5>
                                <p><?php echo $genderString; ?></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <button class="btn btn-outline-dark" onclick="openEditModal('<?php echo $_SESSION['id']; ?>', '<?php echo $fullname; ?>', '<?php echo $email; ?>')">
                            Chỉnh sửa thông tin
                          </button>
                          <button class="btn btn-danger" onclick="signout()">Đăng xuất</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
    <div class="card">
        <div class="card-body text-center"> <!-- Center align the content -->
            <h1>Mã vạch thành viên</h1>
            <img style="width: 75%; display: block; margin: 0 auto;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAL4AAABGCAMAAABFa97bAAAAHnRFWHRTb2Z0d2FyZQBid2lwLWpzLm1ldGFmbG9vci5jb21Tnbi0AAABxVBMVEX///8AAAD+/v79/f1UVFQvLy8nJyfNzc14eHhBQUEPDw84ODjh4eFHR0cEBAQYGBhfX1+xsbEQEBCSkpLj4+N+fn6qqqo1NTXi4uKGhob6+vrp6enMzMz4+Pjx8fFZWVnT09PV1dVvb2+UlJSHh4e7u7uTk5MwMDAlJSXDw8NYWFhQUFDr6+sZGRnt7e0UFBRISEi4uLhJSUkBAQGvr6/m5uZxcXFoaGjKysoGBgYoKCjz8/PLy8tXV1c3Nzfw8PCoqKhaWlr5+fnl5eXBwcF2dnYaGhoNDQ0gICBhYWEMDAxPT09gYGA2NjYdHR0+Pj7q6uo5OTmysrK/v7+urq4HBwfa2tpiYmKdnZ2MjIykpKRmZmbHx8ctLS3u7u6BgYEiIiISEhJtbW0JCQnCwsIICAgyMjICAgK0tLSRkZH8/PyDg4N5eXmioqIRERHs7Ox6enoFBQXX19dMTEwXFxe5ubmmpqZ8fHzIyMjk5OTZ2dmQkJAuLi5eXl7g4OAVFRUODg4WFhacnJz7+/tpaWlycnJGRkZNTU1OTk5ubm6Xl5fo6Og9PT29vb1FRUXR0dFsbGzQ0NBRUVFKSkq6urpSUlLJycnzkPhEAAADIElEQVR4nO2W+VPTQBTH9wUslgDFKJegFBUsiBRBUDk8ihIpWA6pioqIiAgqKqLiCXjft/69ZrM5drcl6Q/WGZ33nWnzdveTt59Ok7QEgBD6ct/ZDDuyWQB7LDPuyCaJFXvEd1uL48+QSd4sTW/UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33UR33Uz6L+n89f6I36fltkszfq+22Rzd6o77dFNnujvt8W2ez9j+v/Z1FyA2bUSnnlGJ3uGHOZjltpzn/wKI/vk5YhX/d7MryDZ5/U5Kyz/p9VGYOtO3Zq0Ra2F+k1p09TZpwht4nMkKVFeMz68Awp6A6tvqmx9/isf/NkeAeRyTA5ZflbjEM1RHY1tx7oMuf0fgG5PA2zRGbuJTUIpDJPNQi+ak1a/m2J+IIf4zrwTKYpgQp6CNcqhOyFblorMMATVfrMDSIzdyHykNN3mFx4Rsgo3GFaQTicpo/AcA48k2E2gLrZGbTBQXroBG1w4KQ9GZ6cvsqdYDHl95uIq+8yy/PGRyTRZXMwBl/cE9dgBAdpL98UaFq5M1DaoZ0eY8fNS19hsypMDxSkMDSuvsuEVp4b75MhWr9PwtTq97AnIzqIe/mnEEqdurEaOg5ZkkMjATjL6tpLV2B+IZXh9V2mAV5UNtZBIa1LADQNkgtejOgg7OWfPFCdujYE+zrdpS6odupZ+zoVGf7WtZnyVfPp8Y7WwzChKBXw04sRHfi9Msh62GiXdbB7D7/UCWVOPadp6RhB32aGXg5GIGE+SCb1OWNeT3gxggPPZJIgbLKqGlCbhKVROOe21BfTMaI+Y4wo3cA+ZNy8ukP5XgzvIDH+CRTlWFUF1PMLyohWdJ4WF2LG8+8ae1hKjKPPM4R+R29Z8QE+EvIDgl4M7yAx/sm3736yDRqKjZiP6Z6+E8Ydd4aWsXhSzY1Ab4/McPoCQ0gpvI6xqr61qKV5ZuaXF8M5SEwGUYvtajv7wT5C66PxxHD7KTY/cVGfGr9+M4WhKXuSyhDS12//gpKlT9Foc5U3wzmIjJTf+WijnhXZVzMAAAAASUVORK5CYII=" class="card-img-top" alt="Barcode"> <!-- Center the image -->
            <p class="mt-3">Vui lòng đưa mã vạch trên thẻ thành viên này cho nhân viên thu ngân khi bạn thanh toán cho sản phẩm đã mua.</p>
            <div class="d-flex justify-content-between">
                <!-- <button class="btn btn-outline-dark">IN MÃ VẠCH</button> -->
                <!-- <button class="btn btn-danger" onclick="signout()">Đăng xuất</button> -->
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="modalId" value="">
                    <div class="mb-3">
                        <label for="modalTitleInput" class="form-label">Họ và tên</label>
                        <textarea class="form-control" id="modalName" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Email</label>
                        <textarea class="form-control" id="modalEmail" rows="1"></textarea>
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
        function signout() {
          fetch('/user/auth.php', {
                  method: 'POST',
                  body: new URLSearchParams({
                      action: 'signout'
                  }),
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      window.location.href = '/user/signin.php';
                  }
              })
        }
    </script>

    <script>
      function openEditModal(id, fullname, email) {
            document.getElementById('modalId').value = id;
            document.getElementById('modalName').innerText = fullname;
            document.getElementById('modalEmail').innerText = email;

            $('#editModal').modal('show');
        }

      document.getElementById('saveChangesBtn').addEventListener('click', function() {
          var Id = document.getElementById('modalId').value;
          var newName = document.getElementById('modalName').value;
          var newEmail = document.getElementById('modalEmail').value;

          const formData = new FormData();
          formData.append('action', 'update');
          formData.append('id', Id);
          formData.append('fullname', newName);
          formData.append('email', newEmail);
          fetch('/user/manage.php',{
              method : 'POST',
              body : formData
          })
          $('#editModal').modal('hide');
          window.location.reload();
      });
    </script>
</body>

</html>
