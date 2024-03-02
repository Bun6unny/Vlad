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

    // Получение идентификатора новости из параметра запроса
    $news_id = $_GET['id'];

    // Запрос к базе данных для получения информации о выбранной новости
    $sql = "SELECT * FROM News WHERE id = $news_id";
    $result = $mysqli->query($sql);

    // Если новость найдена, отобразить ее детали
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>{$row['Head']}</h1>";
        echo "<img src='{$row['Image']}' alt='Изображение новости'>";
        echo "<p>{$row['Content']}</p>";
    } else {
        echo "<p>Новость не найдена</p>";
    }

    // Закрытие соединения с базой данных
    $mysqli->close();
?>