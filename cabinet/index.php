<?php

session_start();

if(isset($_SESSION['user_id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "BtB";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM Users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        echo "Привет, " . $user['Login'] . "! Добро пожаловать в ваш личный кабинет!";
    } else {
        echo "Ошибка: Пользователь не найден.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../login/");
    exit();
}

?>