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
        
        $totalItems = 0;

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
                            <div class="user-sign">Корзина</div>
                            <div class="item-wrap">
                            <div class="item-box">';
                
                $sql = "SELECT items FROM Users WHERE id = $userId";
                $result_items = $mysqli->query($sql);
                if ($result_items) {
                    $row_items = $result_items->fetch_assoc();
                    if ($row_items) {
                        $items = explode(", ", $row_items['items']);
                        $itemNumber = -1;

                        foreach ($items as $item) {
                            $item = $mysqli->real_escape_string($item);
                            $itemNumber++;

                            $sql_candy = "SELECT Image FROM Candy WHERE Name = '$item'";
                            $result_candy = $mysqli->query($sql_candy);
                            if ($result_candy->num_rows > 0) {
                                $row_candy = $result_candy->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<img src='{$row_candy['Image']}' alt='{$item}' style='max-width:50%;max-height:50%;'>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                            }

                            $sql_drinks = "SELECT Image FROM Drinks WHERE Name = '$item'";
                            $result_drinks = $mysqli->query($sql_drinks);
                            if ($result_drinks->num_rows > 0) {
                                $row_drinks = $result_drinks->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<img src='{$row_drinks['Image']}' alt='{$item}' style='max-width:50%;max-height:50%;'>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                            }
                        }
                    } else {
                        echo "Для этого пользователя нет записей.";
                    }
                } else {
                    echo "Ошибка при выполнении запроса к базе данных: " . $mysqli->error;
                }

                echo '</div>
                <form method="post" action="user_cart.php">
                    <button type="submit" name="clear_items">Очистить столбец items</button>
                </form>';
                echo "Всего товаров на странице: $totalItems";
                echo '</div></div></div>';
            }
        } else {
            echo "Пользователь не найден.";
        }

        echo "Всего товаров на странице: $totalItems";

        if (isset($_POST['clear_items'])) {
            $sql_clear_items = "UPDATE Users SET items = '' WHERE id = $userId";
            if ($mysqli->query($sql_clear_items) === TRUE) {
                echo "<script>setTimeout(function() {alert('Товар оформлен!');}, 500);setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
            } else {
                echo "<script>alert('Ошибка при очистке столбца items: " . $mysqli->error . "');</script>";
            }
        }

        if ($totalItems <= 2) {
            $footerMargin = 1;
        }
        
        if ($totalItems > 2) {
            $footerMargin = 9;
        }

        if ($totalItems > 3) {
            $footerMargin = 21;
        }

        if ($totalItems > 4) {
            $footerMargin = 34;
        }

        if ($totalItems > 5) {
            $footerMargin = 47;
        }

        if ($totalItems > 6) {
            $footerMargin = 60;
        }

        if ($totalItems > 7) {
            $footerMargin = 73;
        }

        if ($totalItems > 8) {
            $footerMargin = 86;
        }

        if ($totalItems > 9) {
            $footerMargin = 99;
        }

        
if (isset($_POST['item'])) {
    $itemToDelete = $_POST['item'];
    $sql = "UPDATE Users SET items = REPLACE(items, '$itemToDelete, ', '') WHERE id = $userId";
    if ($mysqli->query($sql) === TRUE) {
        http_response_code(200);
    } else {
        echo "Ошибка при выполнении запроса: " . $mysqli->error;
        http_response_code(500);
    }
}

        $mysqli->close();
    ?>

<div class="footer" style="margin-top:<?php echo $footerMargin; ?>%;">
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