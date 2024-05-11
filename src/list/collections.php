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
    <link rel="stylesheet" href="collections-style.css">
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
?>
<body>
    <h1 class="mt-3">Bộ sưu tập</h1>
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
                SELECT * FROM collection
            ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>

        <div class="col-3 justify-content-center main-box">
            <a href="/list/index.php?name=<?php echo $row['name']; ?>" style="text-decoration: none; color: black;">
                <div class="frame">
                    <img class="mt-3 product-image" src="<?php echo $row['primary_image']; ?>" alt="Product Image">
                </div>
                <div class="product-title">
                    <?php echo $row['name']; ?>
                </div>
            </a>
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
</html>