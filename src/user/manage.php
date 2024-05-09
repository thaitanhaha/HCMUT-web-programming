<?php 
function connectdb() {
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function manageUser() {
    $conn = connectdb();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['action'] === 'update'){
            update_user($_POST['id'], $_POST['fullname'], $_POST['email'], $conn);
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

function update_user($id, $fullname, $email, $conn){
    try {
        $sql = "
            UPDATE user SET fullname='$fullname', email='$email' WHERE id=$id
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

manageUser();