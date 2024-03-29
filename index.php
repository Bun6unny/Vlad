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
        <img class="phone-img" src="img/ss.png" onclick="Main()" style="max-height:65%;max-width:65%;cursor:pointer;">
        <img class="computer-img" src="img/ss.png" onclick="Main()" style="max-height:90%;max-width:90%;cursor:pointer;">
        <div class="top-menu-one phone-div">
            <div class="top-menu-part">
                <div class="search">
                    <input id="searchInput" type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img id="searchButton" src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
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
                    <input id="searchInput" type="text" placeholder="Выполнить поиск по сайту..." class="search-left">
                    <div class="search-right">
                        <img id="searchButton" src="img/search.png" style="max-width:95%;max-height:95%;cursor:pointer;">
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
            <img style="max-height: 70%; max-width: 95%;" src="img/candy.png">
            <div>Конфеты</div>
        </button>
        <button class="menu-button" onclick="Catalog('drinks')">
            <img style="max-height: 70%; max-width: 95%;" src="img/cola.png">
            <div>Напитки</div>
        </button>
        <button class="menu-button" onclick="Catalog('chocolate')">
            <img style="max-height: 70%; max-width: 95%;" src="img/chock.png">
            <div>Шоколад</div>
        </button>
        <button class="menu-button" onclick="Catalog('marmalade')"> 
            <img style="max-height: 70%; max-width: 95%;" src="img/marm.png">
            <div>Мармелад</div>
        </button>
        <button class="menu-right-button" onclick="Catalog('cookies')">
            <img style="max-height: 70%; max-width: 95%;" src="img/cokie.png">
            <div>Печенье</div>
        </button>
    </div>

    <div class="computer-div">
    <div class="slider">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/2.jpg" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/3.jpg" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/4.jpg" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/5.jpg" class="d-block d-flex m-auto rounded" style="max-width: 80%; height: auto;">
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
    </div>

    <div class="phone-div">
    <div class="slider">
    <div id="carouselExample2" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block d-flex m-auto h-100 rounded" style="max-width: 75%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/2.jpg" class="d-block d-flex m-auto h-100 rounded" style="max-width: 75%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/3.jpg" class="d-block d-flex m-auto h-100 rounded" style="max-width: 75%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/4.jpg" class="d-block d-flex m-auto h-100 rounded" style="max-width: 75%; height: auto;">
            </div>
            <div class="carousel-item">
            <img src="img/5.jpg" class="d-block d-flex m-auto h-100 rounded" style="max-width: 75%; height: auto;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
            <i class="bi bi-arrow-left-circle-fill" style="color: #EC7088"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
            <i class="bi bi-arrow-right-circle-fill" style="color: #EC7088"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    </div>

    <div class="title">О нас</div>

    <div class="candy-spot" style="margin-top:1%;">
        <div class="candy-left">
            <img class="phone-img" src="img/candy1.png" style="max-height: 80%; max-width: auto;margin-top:10%;">
            <img class="computer-img" src="img/candy1.png" style="max-height: 100%; max-width: auto;">
        </div>
        <div class="candy-right" style="width: 40%; height: 65%;display:block;margin-left:1%;">
            <div class="candy-title">Вкусные Шедевры</div>
            Наши сладости - это не просто продукты, это настоящее искусство в каждом кусочке! Мы гордимся своим качеством и тщательно подбираем лучшие ингредиенты для наших продуктов. Независимо от того, ищете ли вы что-то классическое или эксклюзивное, у нас есть все, чтобы порадовать ваш вкусовой рецептор.
        </div>
    </div>
    <div class="candy-spot">
        <div class="candy-left" style="text-align:right; width: 40%; height: 65%;display:block;margin-right:1%;">
            <div class="candy-title">Разнообразие вкусов</div>
            Вдохновляйтесь нашим разнообразием и выбирайте то, что подходит вашему настроению и вкусу. От нежных шоколадных конфет до хрустящих карамелек, мы предлагаем бесконечные варианты сладких удовольствий. Дарите радость себе и своим близким с нашими вкусными подарками!
        </div>
        <div class="candy-right">
            <img class="phone-img" src="img/candy2.png" style="max-height: 75%; max-width: auto;margin-top:10%;">
            <img class="computer-img" src="img/candy2.png" style="max-height: 100%; max-width: auto;">
        </div>
    </div>
    <div class="candy-spot">
        <div class="candy-left">
            <img class="phone-img" src="img/candy3.png" style="max-height: 80%; max-width: auto;margin-top:10%;">
            <img class="computer-img" src="img/candy3.png" style="max-height: 100%; max-width: auto;">
        </div>
        <div class="candy-right" style="width: 40%; height: 65%;display:block;margin-left:1%;">
            <div class="candy-title">Сладкая Роскошь</div>    
            Помимо великолепного вкуса, мы также обеспечиваем безупречное качество и сервис. Наша команда стремится сделать ваше покупательное путешествие приятным и незабываемым. Мы уверены, что каждый, кто попробует наши сладости, найдет что-то особенное и уникальное для себя.
        </div>
    </div>

    <div class="action">
        <button class="action-button" onclick="About()">Больше о нас</button>
    </div>

    <div class="title">Где нас найти</div>

    <div class="maps-spot">
        <div class="map-block" style="margin-right:10%;">
            <div class="place-up">
                <img src="img/onix.jpg" style="max-width:95%;max-height:95%; margin-top:3%;border:0.2vw solid #EC7088;border-radius:0.5vw">
            </div>
            <div class="place-down">
                Телефон: +7 (922) 342-20-76<br>
                Почта: pozitivnishred2017@gmail.com
            </div>
        </div>
        <div class="map-block">
            <div class="map-up">
                Мы на карте
            </div>
            <div id="map1" style="position:relative;overflow:hidden;">
                <iframe src="https://yandex.ru/map-widget/v1/?ll=56.221003%2C58.003263&mode=whatshere&whatshere%5Bpoint%5D=56.221003%2C58.003263&whatshere%5Bzoom%5D=17&z=17" width="96%" height="76%" frameborder="1" allowfullscreen="true" style="border:0.2vw solid #EC7088;border-radius:0.5vw; margin-left:2%;"></iframe>
            </div>
        </div>
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