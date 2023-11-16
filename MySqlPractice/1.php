<?php
$mysqli = new mysqli("localhost", "root", "", 'users');

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

function displayUsers($mysqli) {
    $query = "SELECT id, name, login FROM users";
    $result = $mysqli->query($query);

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Логин</th>
                <th>Действия</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['login']}</td>
                <td>
                    <a href='edit_user.php?id={$row['id']}'>Редактировать</a>
                    <a href='delete_user.php?id={$row['id']}'>Удалить</a>
                </td>
            </tr>";
    }

    echo "</table>";
}

displayUsers($mysqli);

$mysqli->close();
?>