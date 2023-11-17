<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "root", "", "users_DB");

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

function displayUsers($mysqli) {
    $query = "SELECT id, name, loginUsers FROM Users_1"; // Исправлено имя таблицы
    $result = $mysqli->query($query);

    if (!$result) {
        die('Ошибка выполнения запроса: ' . $mysqli->error);
    }

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Логин</th>
                <th>Удаление</th>
                <th>Редактирование</th>

            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['loginUsers']}</td> 
                <td><form action='delete.php' method='post'>
                <input type='hidden' name='id' value='" . $row["id"] . "' />
                <input type='submit' value='Удалить'>
        </form></td>
                <td>
                    <a  style='color:coral;' href='edit_user.php?id={$row['id']}'>Редактировать</a>
                </td>
            </tr>";
           
    }

    echo "</table>";
}

displayUsers($mysqli);

echo "<br><a style='padding: 5px 15px; background-color:coral; color:white;' href='addUser.php'>Добавить</a>";

$mysqli->close();
?>
</body>
</html>