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
    <link rel="stylesheet" href="style/phone-style.css">
</head>
<body>

    <div class="header">
        <div class="header-left">
            <a href="#" onclick="Main()" style="margin-left: 0%;">Главная</a>
            <a href="#" onclick="News()">Новости</a>
            <a href="#" onclick="About()">О нас</a>
            <a href="#" onclick="Feedback()" style="margin-right: 0%;">Обратная связь</a>
        </div>
        <?php
            session_start();
            if(isset($_SESSION['user_id'])) {
                echo '<div class="header-right" style="margin-right:1%;">';
                echo '<a href="logout.php">Выход</a>';
                echo '</div>';
            } else {
                echo '<div class="header-right">';
                echo '<a href="#" onclick="Login_But()">Авторизация</a>';
                echo '<a href="#" onclick="Registration()">Регистрация</a>';
                echo '</div>';
            }
        ?>
    </div>

    <div class="top-menu" style="margin-top:1%;">
        <img src="img/ss.png" onclick="Main()" style="max-height:90%;max-width:90%;cursor:pointer;">
        <div class="top-menu-one">
            <div class="top-menu-part">
                +7 (922) 342-20-76
                <div class="phone">
                    <div style="margin-left:5%;">Обратный&nbspзвонок</div>
                </div>
            </div>
            <div class="top-menu-part">
                <div class="search">
                    <input id="searchInput" type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img id="searchButton" src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu-two">
            <div class="top-menu-time-mail" style="margin-top:5%;">
                <img src="img/time.png" style="max-width:50%;max-height:50%;">
                &nbsp&nbspРаботаем 24/7
            </div>
            <div class="top-menu-time-mail">
                <img src="img/mail.png" style="max-width:50%;max-height:50%;">
                &nbsp&nbsppozitivnishred2017@gmail.com
            </div>
        </div>
        <button class="top-menu-button" style="margin-left:2%;" onclick="User()">
            Личный кабинет<br>
            <img src="img/but3.png" style="max-width:60%; max-height:60%; margin-top:1%;">
        </button>
        <button class="top-menu-button" style="margin-left:2%;" onclick="Cart()">
            Корзина<br>
            <img src="img/but2.png" style="max-height:60%; max-width:60%; margin-top:3%;">
        </button>
    </div>

    <div class="top-name" style="width:97%;">
        Регистрация
    </div>
    
    <div class="reg">
        <div class="reg-left">Введите ваше имя (Логин):</div>
        <div class="reg-right">
            <input type="text" id="loginInput" style="padding-left:1%;" class="reg-input" placeholder="...">
        </div>
    </div>
    <div class="reg">
        <div class="reg-left">Введите вашу почту:</div>
        <div class="reg-right">
            <input type="text" id="emailInput" style="padding-left:1%;" class="reg-input" placeholder="...">
        </div>
    </div>
    <div class="reg">
        <div class="reg-left">Придумайте пароль:</div>
        <div class="reg-right">
            <input type="password" id="passwordInput" style="padding-left:1%;" class="reg-input" placeholder="...">
        </div>
    </div>
    <div class="reg">
        <div class="reg-left">Повторите пароль:</div>
        <div class="reg-right">
            <input type="password" id="confirmPasswordInput" style="padding-left:1%;" class="reg-input" placeholder="...">
        </div>
    </div>
    <div class="reg">
        <button class="reg-button" onclick="register()">Зарегистрироваться</button>
    </div>
    <div class="reg">
        <div class="already">Уже есть аккаунт?&nbsp<a href="login.php" style="color:#EC7088;">Авторизуйтесь</a>!</div>
    </div>

    <div class="footer" style="margin-top:1%;">
        <div class="footer-left">
        ФИО: Ходырев Владислав Вадимович<br>
        Группа: 2-ИС (б) Курс: 3<br>
        Специальность: Информационные системы и программирование
        </div>
        <div class="footer-right">
            <img src="img/set1.png" onclick="NewTab('https\://vk.com/vhtkrabbit')" style="max-height: 60%; width: auto; height: auto; margin-right:2%; cursor:pointer;">
            <img src="img/set2.png" onclick="NewTab('https\://ok.ru/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img src="img/set3.png" onclick="NewTab('https\://web.telegram.org/k/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img src="img/set4.png" onclick="NewTab('https\://dzen.ru/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img src="img/set5.png" onclick="NewTab('https\://vk.com/yarus.official')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; cursor:pointer;">
        </div>
    </div>

</body>
</html>