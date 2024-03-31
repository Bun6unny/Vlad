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

    <div class="menu">
        <button class="menu-left-button" onclick="Catalog('candy')">
            <img class="phone-img" style="max-height: 60%; max-width: 85%;" src="img/candy.png">
            <img class="computer-img" style="max-height: 70%; max-width: 95%;" src="img/candy.png">
            <div>Конфеты</div>
        </button>
        <button class="menu-button" onclick="Catalog('drinks')">
            <img class="phone-img" style="max-height: 60%; max-width: 85%;" src="img/cola.png">
            <img class="computer-img" style="max-height: 70%; max-width: 95%;" src="img/cola.png">
            <div>Напитки</div>
        </button>
        <button class="menu-button" onclick="Catalog('chocolate')">
            <img class="phone-img" style="max-height: 60%; max-width: 85%;" src="img/chock.png">
            <img class="computer-img" style="max-height: 70%; max-width: 95%;" src="img/chock.png">
            <div>Шоколад</div>
        </button>
        <button class="menu-button" onclick="Catalog('marmalade')"> 
            <img class="phone-img" style="max-height: 60%; max-width: 85%;" src="img/marm.png">
            <img class="computer-img" style="max-height: 70%; max-width: 95%;" src="img/marm.png">
            <div>Мармелад</div>
        </button>
        <button class="menu-right-button" onclick="Catalog('cookies')">
            <img class="phone-img" style="max-height: 60%; max-width: 85%;" src="img/cokie.png">
            <img class="computer-img" style="max-height: 70%; max-width: 95%;" src="img/cokie.png">
            <div>Печенье</div>
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

        if (isset($_POST['add_to_cart']) && !isset($_SESSION['user_id'])) {
            echo "<script>setTimeout(function() {alert('Вы не авторизованы.');}, 1000);</script>";
        } else {
            if (isset($_POST['add_to_cart'])) {
                $itemName = $_POST['item_name'];
                $userId = $_SESSION['user_id'];
        
                $updateQuery = "UPDATE Users SET items = CONCAT(items, ', $itemName') WHERE id = $userId";
        
                if ($mysqli->query($updateQuery) === TRUE) {
                    echo "<script>setTimeout(function() {alert('Товар добавлен в корзину');}, 1000);</script>";
                } else {
                    echo "<script>setTimeout(function() {alert('Ошибка при добавлении товара: " . $mysqli->error . "');}, 1000);</script>";
                }
            }
        }

        $mysqli->close();
    ?>
    
    <?php
        $host = 'localhost';
        $username = '2is-b11_2is-b11';
        $password = 'dTav2z8hny';
        $database = '2is-b11_2is-b11';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $categoryName = '';

        switch ($category) {
            case 'candy':
                $categoryName = 'Конфеты';
                $table = 'Candy';
                $after_price = '/ 250г';
                break;
            case 'drinks':
                $categoryName = 'Напитки';
                $table = 'Drinks';
                $after_price = '/ 1л';
                break;
            case 'chocolate':
                $categoryName = 'Шоколад';
                $table = 'Chocolate';
                $after_price = '/ 250г';
                break;
            case 'marmalade':
                $categoryName = 'Мармелад';
                $table = 'Marmalade';
                $after_price = '/ 250г';
                break;
            case 'cookies':
                $categoryName = 'Печенье';
                $table = 'Cookies';
                $after_price = '/ 250г';
                break;
            default:
                echo "Неверная категория";
                exit;
        }

        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        $order = '';
        switch ($sort) {
            case 'popularity':
                break;
            case 'price_asc':
                $order = " ORDER BY Price ASC";
                break;
            case 'price_desc':
                $order = " ORDER BY Price DESC";
                break;
            default:
                break;
        }

        $sql = "SELECT * FROM $table" . $order;
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $num_rows = $result->num_rows;
            echo "<div class='catalog-adaptive-one' style='font-weight:bold;margin-left:8%;display:inline-block;'>{$categoryName}:<div style='color:#EC7088;display:inline-block;'>&nbspколичество товаров - {$num_rows}</div></div>";
            echo "<div class='catalog-adaptive-two' style='font-weight:100;margin-left:8%;margin-top:1%;'>Сортировка: <a style='color:#EC7088;' href='?category=$category&sort=popularity'>По популярности</a> | <a style='color:#EC7088;' href='?category=$category&sort=price_asc'>Сначала дешевле</a> | <a style='color:#EC7088;' href='?category=$category&sort=price_desc'>Сначала дороже</a></div>";
            echo "<div class='sell-container'>";
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 3 == 0) {
                    echo "<div class='sell-line'>";
                }
                echo "<div class='sell-block'>";
                echo "<div class='sell-item'>";
                echo "<div class='sell-image'><img src='{$row['Image']}' style='max-width:90%;max-height:90%;border-radius:0.3vw;' alt='{$row['Name']}'></div>";
                echo "<div class='sell-right'>";
                echo "<div class='sell-right-item' style='margin-top:1%;'>";
                echo "<div>{$row['Name']}</div>";
                echo "</div>";
                echo "<div class='sell-right-item'>";
                echo "<div class='sell-adaptive' style='font-weight:100;'>{$row['Price']}&nbsp₽&nbsp$after_price</div>";
                echo "</div>";
                echo "<div class='sell-right-item'>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='item_name' value='{$row['Name']}'>";
                echo "<button type='submit' class='sell-button' name='add_to_cart'>Добавить в корзину</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
                if ($count % 3 == 0) {
                    echo "</div>";
                }
            }
            if ($count % 3 != 0) {
                $empty_blocks = 3 - ($count % 3);
                for ($i = 0; $i < $empty_blocks; $i++) {
                    echo "<div class='sell-block'></div>";
                }
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='no-items'>{$categoryName}: товаров нет</div>";
        }

        $mysqli->close();
    ?>

    <div class="computer-div"></div>
    <div class="phone-div">
        <div style="height:39%"></div>
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