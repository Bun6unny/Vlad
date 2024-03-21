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

function Login_But() {
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

function Cart() {
    var url = "user_cart.php";
    window.location.href = url;
}

function Catalog(category) {
    window.location.href = 'catalog.php?category=' + category;
}

function NewTab(url) {
    window.open(url, '_blank');
}

function Update() {
    alert("Находится в разработке!");
}

function register() {
    var login = document.getElementById("loginInput").value;
    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;
    var confirmPassword = document.getElementById("confirmPasswordInput").value;

    if (login === "" || email === "" || password === "" || confirmPassword === "") {
        alert("Заполните все поля!");
        return;
    }

    if (password !== confirmPassword) {
        alert("Пароли не совпадают");
        return;
    }

    if (!email.includes('@')) {
        alert("Неправильная почта");
        return;
    }

    var xhrCheckLogin = new XMLHttpRequest();
    xhrCheckLogin.open("POST", "check_login.php", true);
    xhrCheckLogin.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhrCheckLogin.onreadystatechange = function () {
        if (xhrCheckLogin.readyState === 4 && xhrCheckLogin.status === 200) {
            if (xhrCheckLogin.responseText === "exists") {
                alert("Логин уже занят!");
            } else {
                sendData(login, email, password);
            }
        }
    };
    xhrCheckLogin.send("login=" + login);
}

function sendData(login, email, password) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            if (xhr.responseText === "Пользователь успешно зарегистрирован") {
                window.location.href = "login.php";
            }
        }
    };
    xhr.send("login=" + login + "&email=" + email + "&password=" + password);
}

function login() {
    var login = document.getElementById("loginInput").value;
    var password = document.getElementById("passwordInput").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login_check.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                window.location.href = "user.php";
            } else {
                alert("Неправильный логин или пароль");
            }
        }
    };
    xhr.send("login=" + login + "&password=" + password);
}

document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.getElementById('delete-account');

    if (deleteButton) {
        deleteButton.addEventListener('click', function() {
            if (confirm("Вы уверены, что хотите удалить свой аккаунт?")) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_account.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            window.location.href = 'index.php';
                        } else {
                            alert("Ошибка удаления аккаунта: " + xhr.responseText);
                        }
                    }
                };

                xhr.send();
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('change-username-btn').addEventListener('click', function() {
        var newUsername = document.getElementById('new-username').value;

        if (newUsername.trim() === "") {
            alert("Пожалуйста, введите новый логин.");
            return;
        }

        var formData = new FormData();
        formData.append('newUsername', newUsername);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_username.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert("Логин успешно изменен!");
                } else {
                    alert("Ошибка изменения логина: " + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('change-password-btn').addEventListener('click', function() {
        var newPassword = document.getElementById('new-password').value;

        if (newPassword.trim() === "") {
            alert("Пожалуйста, введите новый пароль.");
            return;
        }

        var formData = new FormData();
        formData.append('newPassword', newPassword);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_password.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert("Пароль успешно изменен!");
                } else {
                    alert("Ошибка изменения пароля: " + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('change-email-btn').addEventListener('click', function() {
        var newEmail = document.getElementById('new-email').value;

        if (!newEmail.includes("@")) {
            alert("Пожалуйста, введите корректный адрес электронной почты.");
            return;
        }

        var formData = new FormData();
        formData.append('newEmail', newEmail);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_email.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert("Адрес электронной почты успешно изменен!");
                } else {
                    alert("Ошибка изменения адреса электронной почты: " + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('change-avatar-btn').addEventListener('click', function() {
        var newAvatar = document.getElementById('new-avatar').value;

        var urlPattern = /^(ftp|http|https):\/\/[^ "]+$/;
        if (!urlPattern.test(newAvatar)) {
            alert("Пожалуйста, введите корректный URL-адрес для аватара.");
            return;
        }

        var formData = new FormData();
        formData.append('newAvatar', newAvatar);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_avatar.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert("Аватар успешно изменен!");
                } else {
                    alert("Ошибка изменения аватара: " + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchButton').addEventListener('click', function() {
        var searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
        if (searchQuery) {
            switch (searchQuery) {
                case 'конфеты':
                    window.location.href = 'catalog.php?category=candy';
                    break;
                case 'конфета':
                    window.location.href = 'catalog.php?category=candy';
                    break;
                case 'напитки':
                    window.location.href = 'catalog.php?category=drinks';
                    break;
                case 'напиток':
                    window.location.href = 'catalog.php?category=drinks';
                    break;
                case 'шоколад':
                    window.location.href = 'catalog.php?category=chocolate';
                    break;
                case 'шоколадки':
                    window.location.href = 'catalog.php?category=chocolate';
                    break;
                case 'мармелад':
                    window.location.href = 'catalog.php?category=marmalade';
                    break;
                case 'мармеладки':
                    window.location.href = 'catalog.php?category=marmalade';
                    break;
                case 'печенье':
                    window.location.href = 'catalog.php?category=cookies';
                    break;
                case 'печеньки':
                    window.location.href = 'catalog.php?category=cookies';
                    break;
                case 'печенька':
                    window.location.href = 'catalog.php?category=cookies';
                    break;
                default:
                    alert('По вашему запросу ничего не найдено.');
            }
        } else {
            alert('Пожалуйста, введите запрос для поиска.');
        }
    });
});

function deleteItem(itemName) {
    var confirmation = confirm("Вы уверены, что хотите удалить товар '" + itemName + "' из корзины?");
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_item.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('item=' + encodeURIComponent(itemName));
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        };
    }
}