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
    <script src="../script/script-autho.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Регистрация</title>
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
                Регистрация
            </div>
        </div>
    </div>
    
    <div class="form-place">
        <div class="content-flex" style="height:auto;">
            <div class="form-block">
                <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "BtB";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];
                        $email = $_POST['email'];

                        if ($password !== $confirm_password) {
                            echo "<div class='error'>Пароли не совпадают</div>";
                        } else {
                            $plain_password = $password;

                            $sql_check = "SELECT * FROM Users WHERE Login = ? OR Mail = ?";
                            $stmt_check = $conn->prepare($sql_check);
                            $stmt_check->bind_param("ss", $login, $email);
                            $stmt_check->execute();
                            $result_check = $stmt_check->get_result();

                            if ($result_check->num_rows > 0) {
                                echo "<div class='error'>Пользователь с таким логином или почтой уже существует</div>";
                            } else {
                                $stmt_check->close();

                                $sql = "INSERT INTO Users (Login, Password, Mail) VALUES (?, ?, ?)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("sss", $login, $plain_password, $email);

                                if ($stmt->execute()) {
                                    echo "<div class='error'>Регистрация прошла успешно!<button id='autho' class='standart-button-ver-2' style='margin-top:10px;font-size:24px'>Перейти к авторизации</button></div>";
                                } else {
                                    echo "<div class='error'>Ошибка: " . $stmt->error . "</div>";
                                }

                                $stmt->close();
                            }
                        }
                    }

                    $conn->close();

                ?>
                <div class="form">
                    <form action="" method="post">
                        Придумайте логин:
                        <input type="text" name="login" required>
                        Пароль:
                        <input type="password" name="password" required>
                        Повторите пароль:
                        <input type="password" name="confirm_password" required>
                        Почта:
                        <input type="email" name="email" required>
                        <button type="submit" class="standart-button-ver-2" style="margin-left:60px;margin-top:20px;width:330px">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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