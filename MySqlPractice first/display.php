<?php
$mysqli = new mysqli("localhost", "root", "", "users_DB");

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
function displayUsers($mysqli) {
    $query = "SELECT id, name, loginUsers FROM Users"; // Corrected table name
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
                <td>{$row['loginUsers']}</td> 
                <td>
                
                    <a  style='color:coral;' href='edit_user.php?id={$row['id']}'>Редактировать</a>
                    <a style='color:coral;' href='deleteUser.php?id={$row['id']}'>Удалить</a>
                </td>
            </tr>";
    }

    echo "</table>";
}
displayUsers($mysqli);

echo "<br>" ."  <a  style='padding: 5px 15px; background-color:coral; color:white;' href='addUser.php?id={['id']}'>Добавить</a>";

$mysqli->close();
?>