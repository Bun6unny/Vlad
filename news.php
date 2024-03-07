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
            <a href="#" onclick="Login_But()">Авторизация</a>
            <a href="#" onclick="Registration()" style="margin-right: 10%;">Регистрация</a>
        </div>
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
                    <input type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
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
        <button class="top-menu-button" style="margin-left:2%;">
            Личный кабинет<br>
            <img src="img/but3.png" style="max-width:60%; max-height:60%; margin-top:1%;">
        </button>
        <button class="top-menu-button" style="margin-left:2%;">
            Корзина<br>
            <img src="img/but2.png" style="max-height:60%; max-width:60%; margin-top:3%;">
        </button>
    </div>

    <div class="top-name" style="width:97%;">
        Новости
    </div>

    <?php
        $host = 'localhost';
        $username = '2is-b11_2is-b11';
        $password = 'dTav2z8hny';
        $database = '2is-b11_2is-b11';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $sql = "SELECT * FROM News";
        $result = $mysqli->query($sql);

        $news = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $news[] = $row;
            }

            $num_news = count($news);

            for ($i = 0; $i < $num_news; $i += 2) {
                echo "<div class='news'>";       
                echo "<div class='news-spot'>";
                echo "<a style='text-decoration: none;color:black;' href='open_news.php?id={$news[$i]['id']}'><div class='news-block'>";
                echo "<div class='news-name'>{$news[$i]['Head']}</div>";
                echo "<div class='news-content'>";
                echo "<div class='news-image'>";
                echo "<img src='{$news[$i]['Image']}' style='max-width:90%;max-height:90%;border-radius:0.3vw;border:0.1vw solid #EC7088;'>";
                echo "</div>";
                echo "<div class='news-text'>";
                echo "{$news[$i]['Content']}";
                echo "</div>";
                echo "</div>";
                echo "<div class='news-next'>Читать далее</div>";
                echo "</div></a>";
                echo "</div>";

                if ($i + 1 < $num_news) {
                    echo "<div class='news-spot'>";
                    echo "<a style='text-decoration: none;color:black;' href='open_news.php?id={$news[$i + 1]['id']}'><div class='news-block'>";
                    echo "<div class='news-name'>{$news[$i + 1]['Head']}</div>";
                    echo "<div class='news-content'>";
                    echo "<div class='news-image'>";
                    echo "<img src='{$news[$i + 1]['Image']}' style='max-width:90%;max-height:90%;border-radius:0.3vw;border:0.1vw solid #EC7088;'>";
                    echo "</div>";
                    echo "<div class='news-text'>";
                    echo "{$news[$i + 1]['Content']}";
                    echo "</div>";
                    echo "</div>";
                    echo "</div></a>";
                    echo "</div>";
                }

                echo "</div>";
            }

            if ($num_news <= 2) {
                echo "<div class='space'></div>";
            }
        } else {
            echo "<div style='width:100%;height:50%;font-size:3vw;display: flex;align-items: center;justify-content: center;font-weight: bold;'>Извините, новостей нет</div>";
        }

        $mysqli->close();
    ?>

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