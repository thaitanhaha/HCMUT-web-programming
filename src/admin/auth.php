<?php 

function request() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    if ($_POST['action'] === 'signin') {
        $usrname = $_POST['username']; 
        $password = $_POST['password'];
        if (password_verify($usrname, '$2y$10$DwhEpMh18b6hXyeBjCmal.Ye1p/peAtCFxKS7uzXrzT45ciuuaN56' ) 
            and password_verify($password, '$2y$10$IPSe1X7wHEQ4NYF6n5/Cr./OyoWVRDqyY3B7axoNGAq/sQU4wkpk6'))
        {   
            session_start();
            $_SESSION['admin_session'] = 'admin';
            echo json_encode(array('success' => 'Credentials are correct'));
            return;
        }
        echo json_encode(array('error' => 'Credentials are incorrect'));
    }
}

request();