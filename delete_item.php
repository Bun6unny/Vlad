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

// Получаем список товаров пользователя
$result = $mysqli->query("SELECT items FROM Users WHERE id = $userId");

if (!$result) {
    echo "Ошибка запроса: " . $mysqli->error;
    exit;
}

$row = $result->fetch_assoc();
$items = $row['items'];

// Разбиваем список товаров на массив
$itemsArray = explode(", ", $items);

// Ищем индекс удаляемого товара
$index = array_search($itemToDelete, $itemsArray);

if ($index !== false) {
    // Удаляем товар из массива
    unset($itemsArray[$index]);

    // Собираем список товаров обратно в строку
    $newItems = implode(", ", $itemsArray);

    // Обновляем запись в базе данных
    $sql = "UPDATE Users SET items = '$newItems' WHERE id = $userId";
    if ($mysqli->query($sql) === TRUE) {
        // Если запрос выполнен успешно, отправляем код состояния 200
        http_response_code(200);
    } else {
        // Если возникла ошибка при выполнении запроса, отправляем соответствующий код состояния
        echo "Ошибка при выполнении запроса: " . $mysqli->error;
        http_response_code(500); // Внутренняя ошибка сервера
    }
} else {
    // Если товар не найден в списке, возвращаем ошибку
    http_response_code(404); // Не найдено
}

$mysqli->close();
?>
