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
        $mail = $_POST['mail'];
        $message = $_POST['message'];

        $mail = $mysqli->real_escape_string($mail);
        $message = $mysqli->real_escape_string($message);

        $sql = "INSERT INTO Messages (Mail, Message) VALUES ('$mail', '$message')";
        if ($mysqli->query($sql) === TRUE) {
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>window.location.href = 'index.php';</script>" . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }
?>
