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

// Здесь выполните SQL-запрос для удаления товара из колонки 'items' вашей базы данных
// Пример: $mysqli->query("UPDATE Users SET items = REPLACE(items, '$itemToDelete, ', '') WHERE id = $userId");

// После успешного удаления товара, отправляем успешный ответ
http_response_code(200);
?>
