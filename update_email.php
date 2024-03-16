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
    $newEmail = $_POST['newEmail'];

    $updateQuery = "UPDATE Users SET Mail = ? WHERE id = ?";
    $statement = $mysqli->prepare($updateQuery);
    $statement->bind_param("si", $newEmail, $userId);
    $result = $statement->execute();

    if ($result) {
        echo "success";
    } else {
        echo "Ошибка запроса: " . $mysqli->error;
    }

    $mysqli->close();
?>
