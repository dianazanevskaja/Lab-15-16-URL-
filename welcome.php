<?php
session_start();

// Проверка наличия аутентификации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Приветственное сообщение
echo "Добро пожаловать, " . $_SESSION['name'] . "!<br>";
echo "Вы успешно авторизованы.<br><br>";

// Кнопка выхода из системы
echo '<a href="logout.php">Выйти</a>';
?>