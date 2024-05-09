<?php 
function connectdb() {
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function manageNews() {
    $conn = connectdb();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['action'] === 'update'){
            update_news($_POST['id'], $_POST['title'], $_POST['detail'], $conn);
        }
        else if ($_POST['action'] === 'delete'){
            delete_news($_POST['id'], $conn);
        }
        else if ($_POST['action'] === 'add'){
            add_news($_POST['title'], $_POST['detail'], $_POST['image'], $conn);
        }
        else {
            echo json_encode(array('error' => 'Invalid action'));
            return;
        }
    }
    else {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    return;
}

function update_news($id, $title, $detail, $conn){
    try {
        $sql = "
            UPDATE news SET title='$title', detail='$detail' WHERE id=$id
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

function delete_news($id, $conn){
    try {
        $sql = "
            DELETE FROM news WHERE id=$id
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

function add_news($title, $detail, $image, $conn){
    try {
        $sql = "
            INSERT INTO `news` (`title`, `detail`, `date`, `primary_image`) VALUES
            ('$title', '$detail', NOW(), '$image')
        "; 
        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } catch (Exception $e){
        echo json_encode(array('error' => 'error'));
        return;
    }
    return;
}

manageNews();