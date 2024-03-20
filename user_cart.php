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
        <?php
            session_start();
            if(isset($_SESSION['user_id'])) {
                echo '<a href="logout.php">Выход</a>';
            } else {
                echo '<a href="#" onclick="Login_But()">Авторизация</a>';
                echo '<a href="#" onclick="Registration()" style="margin-right: 10%;">Регистрация</a>';
            }
        ?>
        </div>
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
    echo "<div class="user-not-found">Пользователь не авторизован
          <button onclick="Login_But()" class="reg-button" style="width:15%;height:10%;margin-top:2%;">Авторизация</button>
          </div>";
    exit;
}

$userId = $_SESSION['user_id'];

$sql = "SELECT items FROM Users WHERE id = $userId";
$result = $mysqli->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    if ($row) {
        $items = explode(", ", $row['items']);

        foreach ($items as $item) {
            $item = $mysqli->real_escape_string($item);

            $sql_candy = "SELECT Image FROM Candy WHERE Name = '$item'";
            $result_candy = $mysqli->query($sql_candy);
            if ($result_candy->num_rows > 0) {
                $row_candy = $result_candy->fetch_assoc();
                echo "<img src='{$row_candy['Image']}' alt='{$item}'>";
            }

            $sql_drinks = "SELECT Image FROM Drinks WHERE Name = '$item'";
            $result_drinks = $mysqli->query($sql_drinks);
            if ($result_drinks->num_rows > 0) {
                $row_drinks = $result_drinks->fetch_assoc();
                echo "<img src='{$row_drinks['Image']}' alt='{$item}'>";
            }
        }
    } else {
        echo "Для этого пользователя нет записей.";
    }
} else {
    echo "Ошибка при выполнении запроса к базе данных: " . $mysqli->error;
}

if (isset($_POST['clear_items'])) {
    $sql_clear_items = "UPDATE Users SET items = '' WHERE id = $userId";
    if ($mysqli->query($sql_clear_items) === TRUE) {
        echo "<script>setTimeout(function() {alert('Товар оформлен!');}, 500);setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "<script>alert('Ошибка при очистке столбца items: " . $mysqli->error . "');</script>";
    }
}

$mysqli->close();
?>

<form method="post" action="user_cart.php">
    <button type="submit" name="clear_items">Очистить столбец items</button>
</form>