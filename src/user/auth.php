<?php

function request() {
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    // Establish a connection to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check if the connection was successful
    if ($conn->connect_error) {
        echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
        die('Connection failed: ' . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') echo json_encode(array('error' => 'Invalid request method')); 
    if ($_POST['action'] === 'signup'){
        // Sign up
        $usrname = $_POST['username']; // Change variable name to usrname
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        
        $check_user = "SELECT * FROM user WHERE usrname = '$usrname'"; // Change column name to usrname
        $result = $conn->query($check_user);
        if ($result->num_rows > 0) {
            echo json_encode(array('error' => 'User already exists'));
            $conn->close();
            return;
        }


        $hashed_passwd = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user (usrname, passwd, fullname, email, gender) VALUES ('$usrname', '$hashed_passwd', '$fullname', '$email', '$gender')";
        
        $result = $conn->query($sql);
        echo json_encode(array('success' => 'User created successfully'));

        $conn->close();
        return;
    }
    else if ($_POST['action'] === 'signin') {
        // signin
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_user = "SELECT * FROM user WHERE usrname = '$username'";
        $result = $conn->query($check_user);
        if ($result->num_rows == 0) {
            echo json_encode(array('error' => 'User does not exist'));
            return;
        }

        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwd'])) {
            $usrname = $row['usrname'];
            $id = $row['id'];
            session_start();
            $_SESSION['username'] = $usrname;
            $_SESSION['id'] = $id;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $gender = $row['gender'];
            if ($gender === 'F') {
                $_SESSION['gender'] = 'Female';
            } elseif ($gender === 'M') {
                $_SESSION['gender'] = 'Male';
            } elseif ($gender === 'U') {
                $_SESSION['gender'] = 'Other';
            }
            $_SESSION['auth'] = true;
            $query = "SELECT * FROM cart WHERE userid = $id";  
            $result = $conn->query($query);
            if ($result->num_rows == 0) {
                $query = "INSERT INTO cart (userid) VALUES ($id)";
                $conn->query($query);
                $query = "SELECT * FROM cart WHERE userid = $id";  
                $result = $conn->query($query);
            }
            $row = $result->fetch_assoc();
            $_SESSION['cart'] = $row['id'];
            echo json_encode(array(
                'success' => 'Logged in successfully'
            ));
            // header('Location: /user/signin.php');
            return;
        } else {
            echo json_encode(array('fail' => 'Invalid credentials'));
        }
        $conn->close();
        return;
    }
    else if ($_POST['action'] === 'signout') {
        session_start();
        session_unset();
        session_destroy();
        echo json_encode(array('success' => 'Logged out successfully'));
    }
    $conn->close();
    return;
}
request();

