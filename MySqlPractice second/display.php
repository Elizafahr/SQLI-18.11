<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <h1 class='centrated'> Добавить заметку </h1>

    <form action="" class='add' method="post">
        <label for="name">Название:</label>
        <input type="text" name="name" id="name"><br>

        <label for="category">Категория:</label>
        <select name="category" id='category'>
            <?php
            //заполняю select 
            $conn = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
            if ($conn->connect_error) {
                die("Ошибка соединения с базой данных: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM category";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }

            $conn->close();
            ?>
        </select>
        <input type="submit" class='btn' value="Добавить">
    </form>

    <?php

    //добавление записи
    $mysqli = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $category = $_POST['category'];

        $query = "INSERT INTO notes (name, category_id) VALUES ('$name', '$category')";
        $result = $mysqli->query($query);

        if (!$result)
            echo "Ошибка при добавлении пользователя: " . $mysqli->error;
        }
    ?>

    <?php
    //основная таблица
    $mysqli = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    function displayСategory($mysqli)
    {
        //запрос с слиянием таблиц
        $query = "SELECT n.id, n.name, c.name AS category_name
                  FROM notes AS n
                  INNER JOIN category AS c ON n.category_id = c.id";
        $result = $mysqli->query($query);

        if (!$result) {
            die('Ошибка выполнения запроса: ' . $mysqli->error);
        }

        echo "<h2 class='centrated'>Заметки</h2>";
        echo "<table class='centrated' border='1'>
            <thead>
                <th>Название</th>
                <th>Категория</th>
                <th>ID</th>
                <th>Удаление</th>
                <th>Редактирование</th>
            </thead>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['category_name']}</td>
                <td>{$row['id']}</td>
                <td>
                <form action='delete.php' method='post' onsubmit='ask();'>
                <input type='hidden' name='id' value='" . $row["id"] . "' />
                <input class='btn' type='submit' value='Удалить'>
            </form>
                </td>
                <td>
                    <a class='btn' style='color:coral;' href='edit_user.php?id={$row['id']}'>Редактировать</a>
                </td>
            </tr>";
        }
        echo "</table>";
    }

    displayСategory($mysqli);
    $mysqli->close();
    ?>



<script>
function ask(){
    return confirm('Вы уверены?');
}    
</script>
</body>

</html>