<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Если пользователь не авторизован, не выполняем никаких действий
    http_response_code(403); // Ошибка доступа запрещена
    exit;
}

if (!isset($_POST['item'])) {
    // Если параметр 'item' не был передан, возвращаем ошибку
    http_response_code(400); // Ошибка неверного запроса
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

// Выполните SQL-запрос для обновления записи пользователя и удаления товара из корзины
$sql = "UPDATE Users SET items = REPLACE(items, '$itemToDelete, ', '') WHERE id = $userId";
if ($mysqli->query($sql) === TRUE) {
    // Если запрос выполнен успешно, отправьте код состояния 200
    http_response_code(200);
} else {
    // Если возникла ошибка при выполнении запроса, отправьте соответствующий код состояния
    echo "Ошибка при выполнении запроса: " . $mysqli->error;
    http_response_code(500); // Внутренняя ошибка сервера
}

$mysqli->close();
?>
