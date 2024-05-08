<?php 
function connectdb(){
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "btl";
    // Establish a connection to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


function manageCart(){
    session_start();
    if (!isset($_SESSION['id'])){
        echo json_encode(array('error' => 'You must be logged in to use cart'));
        return;
    }
    $id = $_SESSION['id'];
    $conn = connectdb();
    if (!isset($_SESSION['cart'])){
        $sql = "SELECT * FROM cart WHERE userid = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['cart'] = $row['id']; // cart id
        }
        else {
            $sql = "INSERT INTO cart (userid) VALUES ($id)";
            $conn->query($sql);
            $sql = "SELECT * FROM cart WHERE userid = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['cart'] = $row['id'];
        }
    }
    // $cart_id = $_SESSION['cart'];    
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($_POST['action'] === 'add'){
            addItem($_POST['id'], $_POST['quantity'], $conn);
        }
        else if ($_POST['action'] === 'remove'){
            removeItem($_POST['id'], $_POST['quantity'], $conn);
        }
        else if ($_POST['action'] === 'clear'){
            clearCart($conn);
        }
        else if ($_POST['action'] === 'delete'){
            deleteItem($_POST['id'], $conn); 
        }
        else {
            echo json_encode(array('error' => 'Invalid action'));
            return;
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        getCart($conn);
        return;
    }
    else {
        echo json_encode(array('error' => 'Invalid request method'));
        return;
    }
    return;
}

function addItem($item, $quantity, $conn){
    $cart = $_SESSION['cart'];
    $sql = "SELECT * FROM cart_item WHERE cartid = $cart AND productid = $item";
    try {
        if ($result = $conn->query($sql)){
            $row = $result->fetch_assoc();
            if ($row){
                $quantity += $row['quantity'];
                $sql = "UPDATE cart_item SET quantity = $quantity WHERE cartid = $cart AND productid = $item";
                $conn->query($sql);
            }
            else {
                $sql = "INSERT INTO cart_item (cartid, productid, quantity) VALUES ($cart, $item, $quantity)";
                $conn->query($sql);
            }
        }
        echo json_encode(array('success' => 'Item added to cart'));
        return;
    } catch (Exception $e){
        echo json_encode(array('error' => 'Failed to add item to cart'));
        return;
    }
    return;
}

function removeItem($item, $quantity, $conn){
    $cart = $_SESSION['cart'];
    $sql = "SELECT * FROM cart_item WHERE cartid = $cart AND productid = $item";
    try {
        if ($result = $conn->query($sql)){
            $row = $result->fetch_assoc();
            if ($row){
                $quantity = $row['quantity'] - $quantity;
                if ($quantity <= 0){
                    $sql = "DELETE FROM cart_item WHERE cartid = $cart AND productid = $item";
                    $conn->query($sql);
                }
                else {
                    $sql = "UPDATE cart_item SET quantity = $quantity WHERE cartid = $cart AND productid = $item";
                    $conn->query($sql);
                }
            }
        }
        echo json_encode(array('success' => 'Item removed from cart'));
        return;
    } catch (Exception $e){ echo json_encode(array('error' => 'Failed to remove item from cart')); return;}
    return;
}

function deleteItem($id, $conn){
    $cart = $_SESSION['cart'];
    $sql = "DELETE FROM cart_item WHERE cartid = $cart AND productid = $id";
    try {
        $conn->query($sql);
        echo json_encode(array('success' => 'Item deleted from cart'));
        return;
    } catch (\Throwable $th) {
        echo json_encode(array('error' => 'Failed to delete item from cart'));
    }
    return;
}

function clearCart($conn){
    try {
        $cart = $_SESSION['cart'];
        $sql = "DELETE FROM cart_item WHERE cartid = $cart";
        $conn->query($sql);
        echo json_encode(array('success' => 'Cart cleared'));
        return; 
    } catch (Exception $e){
        echo json_encode(array('error' => 'Failed to clear cart'));
        return;
    }
}

function getCart($conn){
    $cart_id = $_SESSION['cart'];
    $sql = "SELECT * FROM cart_item WHERE cartid = $cart_id";
    $result = $conn->query($sql);
    $items = array();
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $id = $row['productid'];
            $quantity = $row['quantity'];
            $sql = "SELECT * FROM product WHERE id = $id";
            $result2 = $conn->query($sql);
            $product = $result2->fetch_assoc();
            $cost = $product['price'] * (100 - $product['percentdiscount'])/100 * $quantity;
            $name = $product['name'];
            $items[] = array('id' => $id, 'name' => $name, 'quantity' => $quantity, 'cost' => $cost);
        }
    }
    echo json_encode($items);
    return;
}

manageCart();