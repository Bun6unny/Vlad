<?php
// Подключение к базе данных
$host = 'localhost';
$username = '2is-b11_2is-b11';
$password = 'dTav2z8hny';
$database = '2is-b11_2is-b11';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Проверка соответствия паролей
    if ($password !== $confirm_password) {
        echo "Пароли не совпадают.";
        exit();
    }
    
    // Защита от SQL-инъекций
    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);
    $password = $mysqli->real_escape_string($password);
    
    // Хеширование пароля
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Вставка данных в таблицу Users
    $sql = "INSERT INTO Users (login, mail, password) VALUES ('$name', '$email', '$hashed_password')";
    
    if ($mysqli->query($sql)) {
        // Редирект на страницу login.php
        header("Location: login.php");
        exit();
    } else {
        echo "Ошибка: " . $mysqli->error;
    }
}

// Закрытие соединения с базой данных
$mysqli->close();
?>