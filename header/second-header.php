<?php

session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../");
    exit();
}

if(isset($_SESSION['user_id'])) {
    $header = '<div class="header">
        <div class="content-flex">
            <div class="logo">
                <img src="../img/logo.png" class="img90">
            </div>
            <div class="main-menu">
                <a href="../">Главная</a>
                <a href="../about/">О нас</a>
                <a href="../poster/">Афиша</a>
            </div>
            <div class="second-menu">
                <a href="?logout">Выход</a>
            </div>
        </div>
    </div>';
} else {
    $header = '<div class="header">
        <div class="content-flex">
            <div class="logo">
                <img src="../img/logo.png" class="img90">
            </div>
            <div class="main-menu">
                <a href="../">Главная</a>
                <a href="../about/">О нас</a>
                <a href="../poster/">Афиша</a>
            </div>
            <div class="second-menu">
                <a href="../login/">Авторизация</a>
                <a href="../registration/">Регистрация</a>
            </div>
        </div>
    </div>';
}

?>