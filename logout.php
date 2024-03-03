<?php
    session_start();
    // Завершаем сессию
    session_destroy();
    // Перенаправляем пользователя на страницу входа или другую страницу
    header("Location: login.php");
    exit;
?>