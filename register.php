<?php
    $host = 'localhost';
    $username = '2is-b11_2is-b11';
    $password = 'dTav2z8hny';
    $database = '2is-b11_2is-b11';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Защита от SQL-инъекций
    $stmt = $mysqli->prepare("INSERT INTO Users (Login, Password, Mail) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $login, $password, $email);

    if ($stmt->execute()) {
        echo "Пользователь успешно зарегистрирован";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
?>