<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <script src="script/script-location.js"></script>
    <script src="script/script-menu.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Главная</title>
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>

    <?php
        require 'header/header.php';
        echo $header;
    ?>

    <div class="offer">
        <div class="content-flex">
            <div class="offer-left">
                <div class="offer-left-top">Добро пожаловать в театр "ЗА МОСТОМ" – мир искусства и вдохновения!</div>
                <div class="offer-left-middle">Открывая новые горизонты театрального искусства</div>
                <div class="offer-left-bottom">
                    <button class="standart-button" id="about">О нашем театре</button>
                </div>
            </div>
            <div class="offer-right">
                <img src="img/offer.png" class="img100" style="height: 100%;">
            </div>
        </div>
    </div>
    
    <div class="title">
        <div class="content-flex">
            <div class="name">
                Популярные спектакли
            </div>
        </div>
    </div>

    <div class="slider-place">
    <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/slider1.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/slider2.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/slider3.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" style="color:white;font-size: 70px;" role="button" data-slide="prev">
          <span class="bi bi-caret-left-fill" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" style="color:white;font-size: 70px;" role="button" data-slide="next">
          <span class="bi bi-caret-right-fill" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    </div>

    <div class="slider-button">
        <div class="slider-button">
            <button class="standart-button" id="poster">Наши спектакли</button>
        </div>
    </div>

    <div class="title-black" style="margin-top: 3rem;">
        <div class="content-flex">
            <div class="name">
                Мы на карте
            </div>
        </div>
    </div>

    <div class="map">
        <div style="position:relative;overflow:hidden;width: 100%;"><a href="https://yandex.ru/maps/org/oniks/1064300558/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Оникс</a><a href="https://yandex.ru/maps/50/perm/category/college/184106236/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Колледж в Перми</a><a href="https://yandex.ru/maps/50/perm/category/further_education/184106162/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Дополнительное образование в Перми</a><iframe src="https://yandex.ru/map-widget/v1/?ll=56.221098%2C58.002892&mode=search&oid=1064300558&ol=biz&z=17.06" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>  
    </div>

    <div class="title-black">
        <div class="content-flex">
            <div class="name">
                <button class="standart-button" id="location">Где нас найти?</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="content-flex">
            <div class="footer-content">
                Ходырев Владислав Вадимович 2-ИС
            </div>
            <div class="footer-content">
                <a href="https://vk.com/vhtkrabbit"><img src="img/vk.png" class="img70"></a>
                <a href="https://www.youtube.com/"><img src="img/ut.png" class="img70"></a>
                <a href="https://rutube.ru/"><img src="img/rt.png" class="img70"></a>
                <a href="https://dzen.ru/"><img src="img/dzen.png" class="img70"></a>
                <a href="https://web.telegram.org/k/"><img src="img/teleg.png" class="img70"></a>
            </div>
        </div>
    </div>

</body>
</html>