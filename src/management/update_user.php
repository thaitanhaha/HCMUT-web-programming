<?php 
function connectdb(){
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function managerUser(){
    session_start();
    if (!isset($_SESSION['admin_session'])){
        echo json_encode(array('error' => 'You must be logged in to use cart'));
        return;
    }
    $conn = connectdb();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($_POST['action'] === 'remove'){
            removeUser($_POST['id'], $conn);
        }
        else {
            echo json_encode(array('error' => 'Invalid action'));
            return;
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        getUser($conn);
        return;
    }
    else {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    return;
}

function removeUser($id, $conn){
    try {
        $sql = "
            DELETE FROM cart WHERE userid = $id;
        ";
        $conn->query($sql);
        $sql1 = "
            DELETE FROM user WHERE id = $id;
        ";
        $conn->query($sql1);
        echo json_encode(array('success' => 'Removed user'));
        return;
    } catch (Exception $e) { 
        echo json_encode(array('error' => 'Failed to remove user')); 
        return;
    }
    return;
}

function getUser($conn){
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    $items = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $fullname = $row['fullname'];
            $gender = $row['gender'];
            $email = $row['email'];
            $items[] = array('id' => $id, 'fullname' => $fullname, 'gender' => $gender, 'email' => $email);
        }
    }
    echo json_encode($items);
    return;
}

managerUser();