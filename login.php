<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
    <h2>Форма входа</h2>
    <form action="authenticate.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Войти">
    </form>
</body>
</html>

<?php
// Подключение к базе данных MySQL
$servername = "localhost";
$username = "root";
$password = "1111";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Поиск пользователя по email
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Аутентификация успешна
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("Location: welcome.php");
        exit();
    } else {
        // Неверный пароль
        echo "Неверный пароль";
    }
} else {
    // Пользователь не найден
    echo "Пользователь не найден";
}
?>
