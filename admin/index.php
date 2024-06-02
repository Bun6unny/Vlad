<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/");
    exit();
}

if ($_SESSION['user_id'] !== 1) {
    header("Location: ../");
    exit();
}

echo 'ЖОПАА';
?>