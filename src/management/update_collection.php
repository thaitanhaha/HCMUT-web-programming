<?php 
function connectdb(){
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function manageCollection(){
    session_start();
    if (!isset($_SESSION['admin_session'])){
        echo json_encode(array('error' => 'You must be logged in to use cart'));
        return;
    }

    $conn = connectdb();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($_POST['action'] === 'remove'){
            remove_collection($_POST['id'], $conn);
        }
        else if ($_POST['action'] === 'update'){
            update_collection($_POST['collectionId'], $_POST['collectionName'], $_POST['collectionImage'], $_POST['collectionProducts'], $conn);
        }
        else if ($_POST['action'] === 'add'){
            add_collection($_POST['collectionName'], $_POST['collectionImage'], $_POST['collectionProducts'], $conn);
        }
        else {
            echo json_encode(array('error' => 'Invalid action'));
            return;
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        getCollection($conn);
        return;
    }
    else {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    return;
}

function update_collection($id, $name, $image, $product_id, $conn) {
    try {
        $sql = "
            UPDATE collection SET name='$name', primary_image='$image', product_id='$product_id' WHERE id=$id;
        ";
        $conn->query($sql);
        echo json_encode(array('success' => 'Removed product'));
        return;
    } catch (Exception $e){
        echo json_encode(array('error' => 'error'));
        return;
    }
    return;
}

function add_collection($name, $image, $product_id, $conn) {
    try {
        $sql = "
        INSERT INTO collection (name, primary_image, product_id)
        VALUES ('$name', '$image', '$product_id');
        ";
        $conn->query($sql);
        echo json_encode(array('success' => 'Add product'));
        return;
    } catch (Exception $e){
        echo json_encode(array('error' => 'error'));
        return;
    }
    return;
}

function remove_collection($id, $conn){
    try {
        $sql = "DELETE FROM collection WHERE id = $id";
        $conn->query($sql);
        echo json_encode(array('success' => 'Removed product'));
        return;
    } catch (Exception $e) { 
        echo json_encode(array('error' => 'Failed to remove product')); 
        return;
    }
    return;
}

function getCollection($conn){
    $sql = "SELECT * FROM collection";
    $result = $conn->query($sql);
    $items = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $primary_image = $row['primary_image'];
            $product_id = $row['product_id'];
            $items[] = array('id' => $id, 'name' => $name, 'primary_image' => $primary_image, 'product_id' => $product_id);
        }
    }
    echo json_encode($items);
    return;
}

manageCollection();