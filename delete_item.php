<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit;
}

if (!isset($_POST['item'])) {
    http_response_code(400); 
    exit;
}

$userId = $_SESSION['user_id'];
$itemToDelete = $_POST['item'];

$host = 'localhost';
$username = '2is-b11_2is-b11';
$password = 'dTav2z8hny';
$database = '2is-b11_2is-b11';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

$result = $mysqli->query("SELECT items FROM Users WHERE id = $userId");

if (!$result) {
    echo "Ошибка запроса: " . $mysqli->error;
    exit;
}

$row = $result->fetch_assoc();
$items = $row['items'];

$itemsArray = explode(", ", $items);

$index = array_search($itemToDelete, $itemsArray);

if ($index !== false) {
    unset($itemsArray[$index]);

    $newItems = implode(", ", $itemsArray);

    $sql = "UPDATE Users SET items = '$newItems' WHERE id = $userId";
    if ($mysqli->query($sql) === TRUE) {
        http_response_code(200);
    } else {
        echo "Ошибка при выполнении запроса: " . $mysqli->error;
        http_response_code(500);
    }
} else {
    http_response_code(404);
}

$mysqli->close();
?>
