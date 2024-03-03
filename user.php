<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Sugar Shack</title>
    <link rel="icon" href="img/ss.ico" type="image/x-icon">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

    <div class="header">
        <div class="header-left">
            <a href="#" onclick="Main()" style="margin-left: 0%;">Главная</a>
            <a href="#" onclick="News()">Новости</a>
            <a href="#" onclick="About()">О нас</a>
            <a href="#" onclick="Feedback()" style="margin-right: 0%;">Обратная связь</a>
        </div>
        <div class="header-right">
        <?php
            session_start();
            if(isset($_SESSION['user_id'])) {
                // Пользователь авторизован, показываем ссылку "Выход"
                echo '<a href="logout.php">Выход</a>';
            } else {
                // Пользователь не авторизован, показываем ссылки "Авторизация" и "Регистрация"
                echo '<a href="#" onclick="Login_But()">Авторизация</a>';
                echo '<a href="#" onclick="Registration()" style="margin-right: 10%;">Регистрация</a>';
            }
        ?>
        </div>
    </div>

    <?php
    session_start();
    var_dump($_SESSION);
    if (isset($_SESSION['user_id'])) {
        // Сессия установлена для пользователя
        echo "Сессия установлена для пользователя с ID: " . $_SESSION['user_id'];
    } else {
        // Сессия не установлена для пользователя
        echo "Сессия не установлена для пользователя";
    }
    ?>