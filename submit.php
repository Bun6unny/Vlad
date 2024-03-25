<?php
    $host = 'localhost';
    $username = '2is-b11_2is-b11';
    $password = 'dTav2z8hny';
    $database = '2is-b11_2is-b11';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (isset($_POST['submit'])) {
        $mail = $mysqli->real_escape_string($_POST['mail']);
        $message = $mysqli->real_escape_string($_POST['message']);

        $sql = "INSERT INTO Messages (Mail, Message) VALUES ('$mail', '$message')";
        if ($mysqli->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Ошибка: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }
?>
