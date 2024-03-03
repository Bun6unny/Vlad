function Main() {
    var url = "index.php";
    window.location.href = url;
}

function News() {
    var url = "news.php";
    window.location.href = url;
}

function Registration() {
    var url = "registration.php";
    window.location.href = url;
}

function Login() {
    var url = "login.php";
    window.location.href = url;
}

function User() {
    var url = "user.php";
    window.location.href = url;
}

function Feedback() {
    var url = "feedback.php";
    window.location.href = url;
}

function About() {
    var url = "about.php";
    window.location.href = url;
}

function NewTab(url) {
    window.open(url, '_blank');
}

function register() {
    var login = document.getElementById("loginInput").value;
    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;
    var confirmPassword = document.getElementById("confirmPasswordInput").value;

    // Проверка на совпадение паролей
    if (password !== confirmPassword) {
        alert("Пароли не совпадают");
        return;
    }

    // Отправка данных на сервер
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // Выводим ответ от сервера
        }
    };
    xhr.send("login=" + login + "&email=" + email + "&password=" + password);
}