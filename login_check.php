<?php
    session_start();

    $host = 'localhost';
    $username = '2is-b11_2is-b11';
    $password = 'dTav2z8hny';
    $database = '2is-b11_2is-b11';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo json_encode(array("success" => false, "message" => "Ошибка подключения к базе данных"));
        exit();
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    // Хешируем введенный пароль
    $hashed_password = md5($password); // Простой пример хеширования, лучше использовать более безопасные методы

    $sql = "SELECT * FROM Users WHERE Login = ? AND Password = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $login, $hashed_password); // Привязываем параметры
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Логин и пароль верные, создаем сессию
        $_SESSION['user_id'] = $login; // Предполагая, что логин уникален и можно использовать как идентификатор пользователя
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Неправильный логин или пароль"));
    }

    $stmt->close();
    $mysqli->close();
?>