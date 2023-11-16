<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            padding: 10px 15px;
            background-color: coral;
            color: white;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name"><br>

    <label for="login">Логин:</label>
    <input type="text" name="login" id="login"><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password"><br>

    <input type="submit" value="Добавить пользователя">
</form>
<?php

$mysqli = new mysqli("localhost", "root", "", "users_DB");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (name, loginUsers, PasswordUsers) VALUES ('$name', '$login', '$password')";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Пользователь успешно добавлен!";
        header("Location: display.php");

    } else {
        echo "Ошибка при добавлении пользователя: " . $mysqli->error;
    }
}
?>
</body>
</html>