<!DOCTYPE html>
<html lang="en">
<header>
    <?php include "../utils/header.php" ?>
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
    $sql = "
        SELECT * FROM news ORDER BY date DESC
    ";
    $result = $conn->query($sql);
?>
<body>
    <h1 class="mt-3">Tin tức</h1>
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

            $sql = "
                SELECT * FROM news
            ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-3 justify-content-center main-box" onclick="toggleBrief(this)">
                <div class="frame">
                    <img class="mt-3" src="<?php echo $row['primary_image']; ?>" alt="">
                </div>
                <div class="mt-2" id="title">
                    <?php echo $row['title']; ?>
                </div>
                <div class="mt-2 mb-2" id="day">
                    <?php echo $row['date']; ?>
                </div>
                <div class="mb-3" id="brief" style="white-space: normal; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
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
</body>

    <script>
        function toggleBrief(element) {
            var brief = element.querySelector("#brief");
            var isExpanded = element.classList.contains("expanded");

            if (isExpanded) {
                brief.setAttribute("style", "white-space: normal; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;");
                element.classList.remove("expanded");
            } else {
                brief.setAttribute("style", "white-space: normal; overflow: visible; text-overflow: clip;");
                element.classList.add("expanded");

                var allMainBoxes = document.querySelectorAll('.main-box');
                allMainBoxes.forEach(function(box) {
                    if (box !== element) {
                        var boxBrief = box.querySelector("#brief");
                        boxBrief.setAttribute("style", "white-space: normal; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;");
                        box.classList.remove("expanded");
                    }
                });
            }
        }
    </script>
</html>