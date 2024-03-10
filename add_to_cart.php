<?php
session_start();

$host = 'localhost';
$username = '2is-b11_2is-b11';
$password = 'dTav2z8hny';
$database = '2is-b11_2is-b11';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Проверяем, авторизован ли пользователь
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    
    // Обработка данных из POST-запроса
    if(isset($_POST['product_name'])) {
        $product_name = $mysqli->real_escape_string($_POST['product_name']); // Получаем название товара из POST-запроса и защищаем от SQL-инъекций
        
        // Получаем текущий список товаров пользователя
        $user_items_sql = "SELECT items FROM Users WHERE id = '$user_id'";
        $user_items_result = $mysqli->query($user_items_sql);
        
        if ($user_items_result->num_rows > 0) {
            $row = $user_items_result->fetch_assoc();
            $current_items = $row['items'];
            
            // Добавляем новый товар к текущему списку
            $updated_items = $current_items != '' ? $current_items . ';' . $product_name : $product_name;
            
            // Обновляем запись в базе данных
            $update_sql = "UPDATE Users SET items = '$updated_items' WHERE id = '$user_id'";
            $mysqli->query($update_sql);
            
            // Возвращаем успешный статус для обработки в JavaScript
            echo "success";
        }
    }
}

$mysqli->close();
?>
