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
        <img class="phone-img ss-img" src="img/ss.png" onclick="Main()">
        <img class="computer-img" src="img/ss.png" onclick="Main()" style="max-height:90%;max-width:90%;cursor:pointer;">
        <div class="top-menu-one phone-div">
            <div class="top-menu-part">
                <div class="search">
                    <input type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu-one computer-div">
            <div class="top-menu-part">
                <div class="computer-div">+7 (922) 342-20-76</div>
                <div class="phone computer-div">
                    <div style="margin-left:5%;">Обратный&nbspзвонок</div>
                </div>
            </div>
            <div class="top-menu-part">
                <div class="search">
                    <input type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu-two computer-div">
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

    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

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
            echo '
            <div class="user-not-found">Пользователь не авторизован
                <button onclick="Login_But()" class="reg-button" style="width:15%;height:10%;margin-top:2%;">Авторизация</button>
            </div>          
            ';
            echo '
            <div class="footer" style="margin-top:1%;">
                <div class="footer-left">
                ФИО: Ходырев Владислав Вадимович<br>
                Группа: 2-ИС (б) Курс: 3<br>
                Специальность: Информационные системы и программирование
                </div>
                <div class="footer-right">
                    <img src="img/set1.png" onclick="NewTab(';
                        echo 'https\://vk.com/vhtkrabbit';
                        echo ')" style="max-height: 60%; width: auto; height: auto; margin-right:2%; cursor:pointer;"><img src="img/set2.png" onclick="NewTab(';
                        echo 'https\://ok.ru/';
                        echo ')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;"><img src="img/set3.png" onclick="NewTab(';
                        echo 'https\://web.telegram.org/k/';
                        echo ')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;"><img src="img/set4.png" onclick="NewTab(';
                        echo 'https\://dzen.ru/';
                        echo ')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;"><img src="img/set5.png" onclick="NewTab(';
                        echo 'https\://vk.com/yarus.official';
                        echo ')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; cursor:pointer;"></div></div>';
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
                echo '<div class="user">
                    <div class="user-left">
                        <div class="user-menu">
                            <div class="user-menu-avatar">
                                <img src="'.$row['image'].'" style="max-width:90%;max-height:90%;margin-top:5%;border-radius:0.2vw;">
                            </div>
                            <div class="user-menu-name">'.$row['Login'].'</div>
                            <div class="user-menu-links">
                                <a href="#" onclick="User()">Настройки</a>
                                <a href="#" onclick="Cart()">Корзина</a>
                                <a href="#" onclick="Update()">История</a>
                                <a href="logout.php">Выход</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-right">
                        <div class="user-sign">Настройки</div>
                        <div class="user-line" style="margin-top:2%;"><div class="user-line-adaptive" style="display:flex;align-items:center;justify-content:flex-end;">Сменить логин:</div><input id="new-username" type="text" placeholder="..." class="user-input">
                            <button class="change-button" id="change-username-btn">Изменить логин</button>
                        </div>
                        <div class="user-line"><div class="user-line-adaptive" style="display:flex;align-items:center;justify-content:flex-end;">Сменить пароль:</div><input id="new-password" type="password" placeholder="..." class="user-input">
                            <button class="change-button" id="change-password-btn">Изменить пароль</button>
                        </div>
                        <div class="user-line"><div class="user-line-adaptive" style="display:flex;align-items:center;justify-content:flex-end;">Сменить почту:</div><input id="new-email" type="text" placeholder="..." class="user-input">
                            <button id="change-email-btn" class="change-button">Изменить почту</button>
                        </div>
                        <div class="user-line-down">Почта сейчас:'.$row['Mail'].'</div>
                        <div class="user-line"><div class="user-line-adaptive" style="display:flex;align-items:center;justify-content:flex-end;">Сменить аватар:</div><input id="new-avatar" type="text" placeholder="..." class="user-input">
                            <button id="change-avatar-btn" class="change-button">Изменить аватар</button>
                        </div>
                        <div class="user-line-down">Только URL-ссылки!</div>
                        <button class="change-button delete" id="delete-account">Удалить аккаунт</button>
                    </div>
                </div>';
            }
        } else {
            echo "Пользователь не найден.";
        }

        $mysqli->close();
    ?>

    <div class="computer-div"></div>
    <div class="phone-div">
        <div style="height:42%;"></div>
    </div>

    <div class="footer" style="margin-top:1%;">
        <div class="footer-left">
        ФИО: Ходырев Владислав Вадимович<br>
        Группа: 2-ИС (б) Курс: 3<br>
        Специальность: Информационные системы и программирование
        </div>
        <div class="footer-right">
            <img class="phone-img" src="img/set1.png" onclick="NewTab('https\://vk.com/vhtkrabbit')" style="max-height: 33%; width: auto; height: auto; margin-right:2%; cursor:pointer;">
            <img class="phone-img" src="img/set2.png" onclick="NewTab('https\://ok.ru/')" style="max-height: 33%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="phone-img" src="img/set3.png" onclick="NewTab('https\://web.telegram.org/k/')" style="max-height: 33%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="phone-img" src="img/set4.png" onclick="NewTab('https\://dzen.ru/')" style="max-height: 33%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="phone-img" src="img/set5.png" onclick="NewTab('https\://vk.com/yarus.official')" style="max-height: 33%; width: auto; height: auto; margin-left:2%; cursor:pointer;">
            <img class="computer-img" src="img/set1.png" onclick="NewTab('https\://vk.com/vhtkrabbit')" style="max-height: 60%; width: auto; height: auto; margin-right:2%; cursor:pointer;">
            <img class="computer-img" src="img/set2.png" onclick="NewTab('https\://ok.ru/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="computer-img" src="img/set3.png" onclick="NewTab('https\://web.telegram.org/k/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="computer-img" src="img/set4.png" onclick="NewTab('https\://dzen.ru/')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; margin-right:2%; cursor:pointer;">
            <img class="computer-img" src="img/set5.png" onclick="NewTab('https\://vk.com/yarus.official')" style="max-height: 60%; width: auto; height: auto; margin-left:2%; cursor:pointer;">
        </div>
    </div>

</body>
</html>