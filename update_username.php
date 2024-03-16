<?php
    session_start();

    $host = 'localhost';
    $username = '2is-b11_2is-b11';
    $password = 'dTav2z8hny';
    $database = '2is-b11_2is-b11';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit;
    }

    if (!isset($_SESSION['user_id'])) {
        echo "Пользователь не авторизован.";
        exit;
    }

    $userId = $_SESSION['user_id'];
    $newUsername = $_POST['newUsername'];

    // Проверяем, существует ли введенный логин уже в таблице
    $checkQuery = "SELECT COUNT(*) as count FROM Users WHERE Login = ?";
    $statement = $mysqli->prepare($checkQuery);
    $statement->bind_param("s", $newUsername);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        echo "Логин уже занят. Выберите другой.";
        exit;
    }

    // Подготовленный запрос для обновления логина
    $updateQuery = "UPDATE Users SET Login = ? WHERE id = ?";
    $statement = $mysqli->prepare($updateQuery);
    $statement->bind_param("si", $newUsername, $userId);
    $result = $statement->execute();

    if ($result) {
        echo "success";
    } else {
        echo "Ошибка запроса: " . $mysqli->error;
    }

    $mysqli->close();
?>