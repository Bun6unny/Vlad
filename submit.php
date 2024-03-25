<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Подключение к базе данных
        $host = 'localhost';
        $username = '2is-b11_2is-b11';
        $password = 'dTav2z8hny';
        $database = '2is-b11_2is-b11';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // Получение данных из формы
        $mail = $_POST['mail'];
        $message = $_POST['message'];

        // Защита от SQL инъекций
        $mail = $mysqli->real_escape_string($mail);
        $message = $mysqli->real_escape_string($message);

        // Выполнение запроса на добавление данных в базу
        $sql = "INSERT INTO Messages (Mail, Message) VALUES ('$mail', '$message')";
        if ($mysqli->query($sql) === TRUE) {
            http_response_code(200); // Возвращаем код успешного выполнения
        } else {
            http_response_code(500); // Возвращаем код ошибки сервера
        }

        // Закрытие соединения с базой данных
        $mysqli->close();
    } else {
        http_response_code(405); // Возвращаем код ошибки "Метод не поддерживается"
    }
?>
