<?php 
function connectdb(){
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function manageProduct(){
    session_start();
    if (!isset($_SESSION['admin_session'])){
        echo json_encode(array('error' => 'You must be logged in to use cart'));
        return;
    }

    $id = $_SESSION['admin_session'];
    $conn = connectdb();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($_POST['action'] === 'remove'){
            removeProduct($_POST['id'], $conn);
        }
        if ($_POST['action'] === 'update'){
            update_product($_POST['productId'], $_POST['productName'], $_POST['productPrice'], $_POST['productDiscount'], $_POST['productDiscountDes'], $_POST['productImage'], $_POST['productSimilar'], $conn);
        }
        else {
            echo json_encode(array('error' => 'Invalid action'));
            return;
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        getProduct($conn);
        return;
    }
    else {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    return;
}

function update_product($id, $name, $price, $discount, $discountdes, $image, $similar, $conn){
    try {
        $sql = "
            UPDATE product SET name='$name', price=$price, percentdiscount=$discount, descriptiondiscount='$discountdes', primary_image='$image', similar_ids='$similar' WHERE id=$id
        "; 
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } catch (Exception $e){
        echo json_encode(array('error' => 'error'));
        return;
    }
    return;
}

function removeProduct($id, $conn){
    try {
        $sql = "DELETE FROM cart_item WHERE productid = $id";
        $conn->query($sql);
        $sql1 = "DELETE FROM product WHERE id = $id";
        $conn->query($sql1);
        echo json_encode(array('success' => 'Removed product'));
        return;
    } catch (Exception $e) { 
        echo json_encode(array('error' => 'Failed to remove product')); 
        return;
    }
    return;
}

function getProduct($conn){
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    $items = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $percentdiscount = $row['percentdiscount'];
            $descriptiondiscount = $row['descriptiondiscount'];
            $primary_image = $row['primary_image'];
            $similar_ids = $row['similar_ids'];
            $items[] = array(
                'id' => $id, 
                'name' => $name, 
                'price' => $price, 
                'percentdiscount' => $percentdiscount, 
                'descriptiondiscount' => $descriptiondiscount, 
                'primary_image' => $primary_image,
                'similar_ids' => $similar_ids);
        }
    }
    echo json_encode($items);
    return;
}

manageProduct();