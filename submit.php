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
    if (isset($_POST['submit'])) {
        // Получение данных из формы
        $mail = $_POST['mail'];
        $message = $_POST['message'];

        // Защита от SQL инъекций
        $mail = $mysqli->real_escape_string($mail);
        $message = $mysqli->real_escape_string($message);

        // Выполнение запроса на добавление данных в базу
        $sql = "INSERT INTO Messages (Mail, Message) VALUES ('$mail', '$message')";
        if ($mysqli->query($sql) === TRUE) {
            echo "Сообщение успешно отправлено!";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $mysqli->error;
        }

        // Закрытие соединения с базой данных
        $mysqli->close();
    }
?>
