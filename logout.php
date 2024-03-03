<?php
    session_start();
    $_SESSION['user_id'] = $user_id;
    // Уничтожаем сессию
    session_destroy();
    // Перенаправляем пользователя на главную страницу или на другую страницу по вашему выбору
    header("Location: index.php"); // Измените index.php на вашу главную страницу
    exit();
?>