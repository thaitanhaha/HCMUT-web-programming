<!DOCTYPE html>
<html lang="en">
<header>
    <?php include "../utils/admin_header.php" ?>
</header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="news-style.css">
</head>
<body>
    <h1 class="mt-3">Tin tức</h1>
    <div class="row d-flex justify-content-center">
        <button type="button" class="btn btn-primary" style="width: 100px;" onclick="openAddModal()">
            Thêm
        </button>
    </div>
    <div class="row d-flex justify-content-center">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "btl";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM news ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-3 justify-content-center main-box" onclick="openModal('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>', '<?php echo $row['detail']; ?>')">
                <div class="frame">
                    <img class="mt-3" src="<?php echo $row['primary_image']; ?>" alt="">
                </div>
                <div class="mt-2" id="title">
                    <?php echo $row['title']; ?>
                </div>
                <div class="mt-2 mb-2" id="day">
                    <?php echo $row['date']; ?>
                </div>
                <div class="mb-3" id="brief">
                    <?php echo $row['detail']; ?>
                </div>
            </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa tin tức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="modalId" value="">
                    <div class="mb-3">
                        <label for="modalTitleInput" class="form-label">Tiêu đề</label>
                        <textarea class="form-control" id="modalTitle" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDetailInput" class="form-label">Chi tiết</label>
                        <textarea class="form-control" id="modalDetail" rows="3"></textarea>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="deleteBtn">Xóa</button>
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Thêm tin tức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="modalId" value="">
                    <div class="mb-3">
                        <label for="addModalTitleInput" class="form-label">Tiêu đề</label>
                        <textarea class="form-control" id="addModalTitle" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addModalDetailInput" class="form-label">Chi tiết</label>
                        <textarea class="form-control" id="addModalDetail" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addModalDetailInput" class="form-label">Đường dẫn tới hình ảnh</label>
                        <textarea class="form-control" id="addModalImage" rows="1"></textarea>
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
        function openModal(id, title, detail) {
            document.getElementById('modalId').value = id;
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDetail').innerText = detail;

            $('#editModal').modal('show');
        }

        function openAddModal() {
            $('#addModal').modal('show');
        }

        document.getElementById('addBtn').addEventListener('click', function() {
            var newsTitle = document.getElementById('addModalTitle').value;
            var newsDetail = document.getElementById('addModalDetail').value;
            var newsImage = document.getElementById('addModalImage').value;

            const formData = new FormData();
            formData.append('action', 'add');
            formData.append('title', newsTitle);
            formData.append('detail', newsDetail);
            formData.append('image', newsImage);
            fetch('/management/update_news.php',{
                method : 'POST',
                body : formData
            })
            $('#editModal').modal('hide');
            window.location.reload();
        });

        document.getElementById('saveChangesBtn').addEventListener('click', function() {
            var newsId = document.getElementById('modalId').value;
            var newTitle = document.getElementById('modalTitle').value;
            var newDetail = document.getElementById('modalDetail').value;

            const formData = new FormData();
            formData.append('action', 'update');
            formData.append('id', newsId);
            formData.append('title', newTitle);
            formData.append('detail', newDetail);
            fetch('/management/update_news.php',{
                method : 'POST',
                body : formData
            })
            $('#editModal').modal('hide');
            window.location.reload();
        });

        document.getElementById('deleteBtn').addEventListener('click', function() {
            var newsId = document.getElementById('modalId').value;

            const formData = new FormData();
            formData.append('action', 'delete');
            formData.append('id', newsId);
            fetch('/management/update_news.php',{
                method : 'POST',
                body : formData
            })
            $('#editModal').modal('hide');
            window.location.reload();
        });
    </script>
</body>
</html>
