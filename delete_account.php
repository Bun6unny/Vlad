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

    $deleteQuery = "DELETE FROM Users WHERE id = $userId";
    $result = $mysqli->query($deleteQuery);

    if (!$result) {
        echo "Ошибка запроса: " . $mysqli->error;
        exit;
    }

    session_unset();
    session_destroy();

    $mysqli->close();
?>