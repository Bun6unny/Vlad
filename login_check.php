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

    $sql = "SELECT * FROM Users WHERE Login = ? AND Password = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $login;
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Неправильный логин или пароль"));
    }

    $stmt->close();
    $mysqli->close();
?>