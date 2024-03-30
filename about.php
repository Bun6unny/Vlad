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

    <div class="phone-div">
    <div class="title" style="border:none;height:3%;">О нас</div>
    </div>
    <div class="computer-div">
    <div class="title" style="border:none;height:7%;">О нас</div>
    </div>

    <div class="computer-div">
    <div class="about-line" style="margin-top:1%;">
        <div class="about-block">
            <div class="about-image"><img src="img/about1.jpg" style="max-width:100%;max-height:100%;border-radius:0.4vw;"></div>
            <div class="about-name">Наши склады</div>
            <div class="about-text">
                Наши склады — это сердце и душа нашей фабрики Sugar Shack. Расположенные в стратегически удобных местах, они представляют собой современные и высокоорганизованные пространства, где каждый этап производственного процесса тщательно контролируется и оптимизируется для обеспечения качества и эффективности.
            </div>
        </div>
        <div class="about-block" style="margin-left:5%;">
            <div class="about-image"><img src="img/about2.jpg" style="max-width:100%;max-height:100%;border-radius:0.4vw;"></div>
            <div class="about-name">Шоколад</div>
            <div class="about-text">
                Наша коллекция шоколада, поставляемого от самых реномированных производителей со всего мира, — это настоящее искусство вкуса и качества. Мы гордимся тем, что предлагаем нашим клиентам только самые изысканные и утонченные варианты шоколадных изделий, которые поражают своим великолепием и непревзойденным вкусом.
            </div>
        </div>
        <div class="about-block" style="margin-left:5%;">
            <div class="about-image"><img src="img/about3.jpg" style="max-width:100%;max-height:100%;border-radius:0.4vw;"></div>
            <div class="about-name">Контроль качества</div>
            <div class="about-text">
                Наши процессы контроля качества начинаются с тщательного отбора сырьевых материалов. Мы работаем только с надежными и сертифицированными поставщиками, чтобы гарантировать свежесть, чистоту и натуральность всех ингредиентов, используемых в нашей продукции.
            </div>
        </div>
    </div>
    <div class="about-line" style="margin-top:3%;margin-bottom:4%;">
        <div class="about-block">
            <div class="about-image"><img src="img/about4.jpg" style="max-width:100%;max-height:100%;border-radius:0.4vw;"></div>
            <div class="about-name">Напитки</div>
            <div class="about-text">
                В Sugar Shack мы предлагаем широкий ассортимент напитков от различных производителей, чтобы удовлетворить самые изысканные вкусовые предпочтения наших клиентов. Наша коллекция напитков — это уникальное сочетание аутентичных вкусов, высокого качества и мастерства приготовления, представленное лучшими производителями со всего мира.
            </div>
        </div>
        <div class="about-block" style="margin-left:5%;">
            <div class="about-image"><img src="img/about5.jpg" style="max-width:100%;max-height:100%;border-radius:0.4vw;"></div>
            <div class="about-name">Мармелад</div>
            <div class="about-text">
                Наш мармелад — это не просто сладость, это искусство вкуса и текстуры. Мы предлагаем широкий выбор мармелада различных форм, цветов и вкусов, чтобы каждый мог найти что-то по своему вкусу. От классических фруктовых вариантов до экзотических ароматов и форм, у нас есть всё для того, чтобы удовлетворить любые ваши желания и предпочтения.
            </div>
        </div>
    </div>
    </div>

    <div class="phone-div">
        <div class="about-block" style="margin-left:10%;margin-top:3%;">
            <div class="about-image"><img src="img/about1.jpg" style="max-width:90%;max-height:90%;border-radius:1vw;"></div>
            <div class="about-name">Наши склады</div>
            <div class="about-text">
                Наши склады — это сердце и душа нашей фабрики Sugar Shack. Расположенные в стратегически удобных местах, они представляют собой современные и высокоорганизованные пространства, где каждый этап производственного процесса тщательно контролируется и оптимизируется для обеспечения качества и эффективности.
            </div>
        </div>
        <div class="about-block" style="margin-left:10%;margin-top:6%;">
            <div class="about-image"><img src="img/about2.jpg" style="max-width:90%;max-height:90%;border-radius:1vw;"></div>
            <div class="about-name">Шоколад</div>
            <div class="about-text">
                Наша коллекция шоколада, поставляемого от самых реномированных производителей со всего мира, — это настоящее искусство вкуса и качества. Мы гордимся тем, что предлагаем нашим клиентам только самые изысканные и утонченные варианты шоколадных изделий, которые поражают своим великолепием и непревзойденным вкусом.
            </div>
        </div>
        <div class="about-block" style="margin-left:10%;margin-top:6%;">
            <div class="about-image"><img src="img/about3.jpg" style="max-width:90%;max-height:90%;border-radius:1vw;"></div>
            <div class="about-name">Контроль качества</div>
            <div class="about-text">
                Наши процессы контроля качества начинаются с тщательного отбора сырьевых материалов. Мы работаем только с надежными и сертифицированными поставщиками, чтобы гарантировать свежесть, чистоту и натуральность всех ингредиентов, используемых в нашей продукции.
            </div>
        </div>
        <div class="about-block" style="margin-left:10%;margin-top:6%;">
            <div class="about-image"><img src="img/about4.jpg" style="max-width:90%;max-height:90%;border-radius:1vw;"></div>
            <div class="about-name">Напитки</div>
            <div class="about-text">
                В Sugar Shack мы предлагаем широкий ассортимент напитков от различных производителей, чтобы удовлетворить самые изысканные вкусовые предпочтения наших клиентов. Наша коллекция напитков — это уникальное сочетание аутентичных вкусов, высокого качества и мастерства приготовления, представленное лучшими производителями со всего мира.
            </div>
        </div>
        <div class="about-block" style="margin-left:10%;margin-top:7%;margin-bottom:6%;">
            <div class="about-image"><img src="img/about5.jpg" style="max-width:100%;max-height:100%;border-radius:1vw;"></div>
            <div class="about-name">Мармелад</div>
            <div class="about-text">
                Наш мармелад — это не просто сладость, это искусство вкуса и текстуры. Мы предлагаем широкий выбор мармелада различных форм, цветов и вкусов, чтобы каждый мог найти что-то по своему вкусу. От классических фруктовых вариантов до экзотических ароматов и форм, у нас есть всё для того, чтобы удовлетворить любые ваши желания и предпочтения.
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