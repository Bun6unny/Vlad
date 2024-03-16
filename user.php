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
                echo '<a href="logout.php">Выход</a>';
            } else {
                echo '<a href="#" onclick="Login_But()">Авторизация</a>';
                echo '<a href="#" onclick="Registration()" style="margin-right: 10%;">Регистрация</a>';
            }
        ?>
        </div>
    </div>

    <?php
        session_start();

        $host = 'localhost';
        $username = '2is-b11_2is-b11';
        $password = 'dTav2z8hny';
        $database = '2is-b11_2is-b11';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit;
        }

        if (!isset($_SESSION['user_id'])) {
            echo "Пользователь не авторизован.";
            exit;
        }

        $userId = $_SESSION['user_id'];

        $result = $mysqli->query("SELECT Login, Mail, image FROM Users WHERE id = $userId");

        if (!$result) {
            echo "Ошибка запроса: " . $mysqli->error;
            exit;
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Логин: " . $row['Login'] . "<br>";
                echo "Email: " . $row['Mail'] . "<br>";
                echo "Изображение: <img src='" . $row['image'] . "'><br>";
            }
        } else {
            echo "Пользователь не найден.";
        }

        $mysqli->close();
    ?>

<form method="post" action="user.php">
    <button type="submit" name="clear_items">Очистить столбец items</button>
</form>