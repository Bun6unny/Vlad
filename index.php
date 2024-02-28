<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Sugar Shack</title>
</head>
<body>

    <?php
    $host = 'localhost';
    $username = '2is-b11_2is-b11';
    $password = 'dTav2z8hny';
    $database = '2is-b11_2is-b11';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // Выполните запрос к таблице
    $sql = "SELECT * FROM News";
    $result = $mysqli->query($sql);

    // Проверка на наличие данных
    if ($result->num_rows > 0) {
        // Вывод данных каждой строки
        while ($row = $result->fetch_assoc()) {
            echo "Заголовок: " . $row["Head"] . "<br>";
            echo "Содержание: " . $row["Content"] . "<br>";
        }
    } else {
        echo "Нет данных";
    }
    ?>

    <div class="header">
        <div class="header-left">
            <a href="#" style="margin-left: 0%;">Главная</a>
            <a href="#">Новости</a>
            <a href="#">О нас</a>
            <a href="#" style="margin-right: 0%;">Обратная связь</a>
        </div>
        <div class="header-right">
            <a href="#">Авторизация</a>
            <a href="#" style="margin-right: 10%;">Регистрация</a>
        </div>
    </div>

    <div class="menu">
        <button class="menu-left-button">
            <img style="max-height: 70%; width: auto; height: auto;" src="img/candy.png">
            <div>Конфеты</div>
        </button>
        <button class="menu-button">
            <img style="max-height: 70%; width: auto; height: auto;" src="img/cola.png">
            <div>Напитки</div>
        </button>
        <button class="menu-button">
            <img style="max-height: 70%; width: auto; height: auto;" src="img/chock.png">
            <div>Шоколад</div>
        </button>
        <button class="menu-button">
            <img style="max-height: 70%; width: auto; height: auto;" src="img/marm.png">
            <div>Мармелад</div>
        </button>
        <button class="menu-right-button">
            <img style="max-height: 70%; width: auto; height: auto;" src="img/cokie.png">
            <div>Печенье</div>
        </button>
    </div>

    <div class="slider">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/1.png" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/2.png" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/3.png" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/4.png" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/5.png" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <i class="bi bi-arrow-left-circle-fill" style="color: #EC7088"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <i class="bi bi-arrow-right-circle-fill" style="color: #EC7088"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>

    <div class="footer" style="margin-top:1%;">
        <div class="footer-left">
        ФИО: Ходырев Владислав Вадимович<br>
        Группа: 2-ИС (б) Курс: 3<br>
        Специальность: Информационные системы и программирование
        </div>
        <div class="footer-right">
            <img src="img/set1.png" style="max-height: 60%; width: auto; height: auto; margin-right:2%;">
            <img src="img/set2.png" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%;">
            <img src="img/set3.png" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%;">
            <img src="img/set4.png" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%;">
            <img src="img/set5.png" style="max-height: 60%; width: auto; height: auto; margin-left:2%;">
        </div>
    </div>

</body>
</html>