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
    <script src="../script/script-location.js"></script>
    <script src="../script/script-menu.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Афиша</title>
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
<body>

    <?php
        require '../header/second-header.php';
        echo $header;
    ?>

    <div class="title-black">
        <div class="content-flex">
            <div class="name">
                Спектакли
            </div>
        </div>
    </div>

    <div class="style-choice">
        <div class="content-flex" style="width:1200px;">
            <div class="style-place">
                <div class="style-menu" id="style-menu">
                    <div class="style-menu-text">Драма</div>
                    <div class="style-menu-img">
                        <img src="../img/arrow-down.png" class="img90">
                    </div>
                    <div class="menu" id="menu">
                        <div class="menu-part"><a href="sort-drama.php">Драма</a></div>
                        <div class="menu-part"><a href="sort-comedy.php">Комедия</a></div>
                        <div class="menu-part"><a href="sort-music.php">Мюзикл</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $database = "BtB";

        $conn = new mysqli($servername, $username, $password, $database);

        $sql = "SELECT id, name, style, image FROM play WHERE style = 'Драма'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="item">
                    <div class="content-flex" style="width:1200px;">
                        <div class="item-place">
                            <div class="item-box">
                                <div class="item-box-left">
                                    <img src="' 
                                    . $row["image"] . 
                                    '" style="border-radius:6px;max-width:100%;height:100%;">
                                    </div>
                                    <div class="item-box-right">
                                    <div class="item-box-style">' 
                                    . $row["style"] . 
                                    '</div>
                                    <div class="item-box-name">' 
                                    . $row["name"] . 
                                    '</div>
                                    <a href="../seance/seance.php?id=' 
                                    . $row["id"] . 
                                    '"><button class="standart-button-ver-2" style="margin-top:20px">Подробнее</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            echo "Нет спектаклей";
        }
        
        $conn->close();

    ?>

    <div class="footer-line" style="margin-top:2%;"></div>

    <div class="footer">
        <div class="content-flex">
            <div class="footer-content">
                Ходырев Владислав Вадимович 2-ИС
            </div>
            <div class="footer-content">
                <a href="https://vk.com/vhtkrabbit"><img src="../img/vk.png" class="img70"></a>
                <a href="https://www.youtube.com/"><img src="../img/ut.png" class="img70"></a>
                <a href="https://rutube.ru/"><img src="../img/rt.png" class="img70"></a>
                <a href="https://dzen.ru/"><img src="../img/dzen.png" class="img70"></a>
                <a href="https://web.telegram.org/k/"><img src="../img/teleg.png" class="img70"></a>
            </div>
        </div>
    </div>

</body>
</html>