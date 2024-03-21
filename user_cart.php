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
        $totalPrice = 0;

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

                            $sql_candy = "SELECT Name, Price, Image FROM Candy WHERE Name = '$item'";
                            $result_candy = $mysqli->query($sql_candy);
                            if ($result_candy->num_rows > 0) {
                                $row_candy = $result_candy->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<div class='item-image'><img src='{$row_candy['Image']}' alt='{$item}' style='max-width:90%;max-height:90%;border-radius:0.3vw;'></div>
                                    <div class='item-right'>
                                    <div class='item-price' style='font-size:1.8vw;font-weight:bold;margin-top:5%;'>   
                                    {$row_candy['Name']}
                                    </div>
                                    <div class='item-price' style='font-size:1.5vw;'>  
                                    {$row_candy['Price']} ₽ / 250г
                                    </div>
                                    </div>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                                $totalPrice = $totalPrice + $row_candy['Price'];
                            }

                            $sql_drinks = "SELECT Name, Price, Image FROM Drinks WHERE Name = '$item'";
                            $result_drinks = $mysqli->query($sql_drinks);
                            if ($result_drinks->num_rows > 0) {
                                $row_drinks = $result_drinks->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<div class='item-image'><img src='{$row_drinks['Image']}' alt='{$item}' style='max-width:90%;max-height:90%;border-radius:0.3vw;'></div>
                                    <div class='item-right'>
                                    <div class='item-price' style='font-size:1.8vw;font-weight:bold;margin-top:5%;'>   
                                    {$row_drinks['Name']}
                                    </div>
                                    <div class='item-price' style='font-size:1.5vw;'>  
                                    {$row_drinks['Price']} ₽ / 1л
                                    </div>
                                    </div>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                                $totalPrice = $totalPrice + $row_drinks['Price'];
                            }

                            $sql_chocolate = "SELECT Name, Price, Image FROM Chocolate WHERE Name = '$item'";
                            $result_chocolate = $mysqli->query($sql_chocolate);
                            if ($result_chocolate->num_rows > 0) {
                                $row_chocolate = $result_chocolate->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<div class='item-image'><img src='{$row_chocolate['Image']}' alt='{$item}' style='max-width:90%;max-height:90%;border-radius:0.3vw;'></div>
                                    <div class='item-right'>
                                    <div class='item-price' style='font-size:1.8vw;font-weight:bold;margin-top:5%;'>   
                                    {$row_chocolate['Name']}
                                    </div>
                                    <div class='item-price' style='font-size:1.5vw;'>  
                                    {$row_chocolate['Price']} ₽ / 250г
                                    </div>
                                    </div>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                                $totalPrice = $totalPrice + $row_chocolate['Price'];
                            }

                            $sql_marmalade = "SELECT Name, Price, Image FROM Marmalade WHERE Name = '$item'";
                            $result_marmalade = $mysqli->query($sql_marmalade);
                            if ($result_marmalade->num_rows > 0) {
                                $row_marmalade = $result_marmalade->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<div class='item-image'><img src='{$row_marmalade['Image']}' alt='{$item}' style='max-width:90%;max-height:90%;border-radius:0.3vw;'></div>
                                    <div class='item-right'>
                                    <div class='item-price' style='font-size:1.8vw;font-weight:bold;margin-top:5%;'>   
                                    {$row_marmalade['Name']}
                                    </div>
                                    <div class='item-price' style='font-size:1.5vw;'>  
                                    {$row_marmalade['Price']} ₽ / 250г
                                    </div>
                                    </div>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                                $totalPrice = $totalPrice + $row_marmalade['Price'];
                            }

                            $sql_cookies = "SELECT Name, Price, Image FROM Cookies WHERE Name = '$item'";
                            $result_cookies = $mysqli->query($sql_cookies);
                            if ($result_cookies->num_rows > 0) {
                                $row_cookies = $result_cookies->fetch_assoc();
                                echo '<div class="item-line" style="margin-top:2%;">
                                    <div class="item-number">'.$itemNumber.'</div>
                                    <div class="item-cart">';
                                echo "<div class='item-image'><img src='{$row_cookies['Image']}' alt='{$item}' style='max-width:90%;max-height:90%;border-radius:0.3vw;'></div>
                                    <div class='item-right'>
                                    <div class='item-price' style='font-size:1.8vw;font-weight:bold;margin-top:5%;'>   
                                    {$row_cookies['Name']}
                                    </div>
                                    <div class='item-price' style='font-size:1.5vw;'>  
                                    {$row_cookies['Price']} ₽ / 250г
                                    </div>
                                    </div>";
                                echo '</div>
                                    <button class="cart-button" onclick="deleteItem(\''.$item.'\')">Удалить</button>
                                </div>';
                                $totalItems++;
                                $totalPrice = $totalPrice + $row_cookies['Price'];
                            }
                        }
                    } else {
                        echo "Для этого пользователя нет записей.";
                    }
                } else {
                    echo "Ошибка при выполнении запроса к базе данных: " . $mysqli->error;
                }

                echo '</div>';
                echo '<div class="item-order">';
                echo '<div class="item-order-box">';
                echo '<div style="width:100%;height:25%;line-height:1.2;font-size:1.8vw;text-align:center;display: flex;align-items: center;justify-content: center;">Оформление товара</div>';
                echo "<div style='width:98%;height:15%;line-height:1.2;font-size:1.2vw;text-align:left;display: flex;align-items: center;justify-content: center;'>Общая стоимость: $totalPrice ₽</div>";
                echo "Всего товаров на странице: $totalItems";
                echo '<form method="post" action="user_cart.php">
                        <button type="submit" name="clear_items">Очистить столбец items</button>
                     </form>';
                echo '</div></div>';
                echo '</div></div></div>';
            }
        } else {
            echo "Пользователь не найден.";
        }

        if (isset($_POST['clear_items'])) {
            $sql_check_items = "SELECT items FROM Users WHERE id = $userId";
            $result = $mysqli->query($sql_check_items);
            
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $items = $row['items'];
                
                if (empty($items)) {
                    echo "<script>setTimeout(function() {alert('Товаров нет!');}, 500);</script>";
                } else {
                    $sql_clear_items = "UPDATE Users SET items = '' WHERE id = $userId";
                    if ($mysqli->query($sql_clear_items) === TRUE) {
                        echo "<script>setTimeout(function() {alert('Товар оформлен!');}, 500);setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
                    } else {
                        echo "<script>alert('Ошибка при очистке столбца items: " . $mysqli->error . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('Ошибка при проверке наличия товаров: " . $mysqli->error . "');</script>";
            }
        }

        if ($totalItems <= 2) {
            $footerMargin = 1;
        }
        
        if ($totalItems > 2) {
            $footerMargin = 11;
        }

        if ($totalItems > 3) {
            $footerMargin = 25;
        }

        if ($totalItems > 4) {
            $footerMargin = 38;
        }

        if ($totalItems > 5) {
            $footerMargin = 49;
        }

        if ($totalItems > 6) {
            $footerMargin = 62;
        }

        if ($totalItems > 7) {
            $footerMargin = 75;
        }

        if ($totalItems > 8) {
            $footerMargin = 88;
        }

        if ($totalItems > 9) {
            $footerMargin = 101;
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