<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

            $id = $conn->real_escape_string($_GET["id"]);
            $sql = "SELECT n.id, n.name, n.category_id, c.name AS category_name
            FROM notes AS n
            INNER JOIN category AS c ON n.category_id = c.id
            WHERE n.id = '$id'";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $categoryId = $row["category_id"];

                    //форма редактирования
                    echo "<h1 class='centrated'>Редактировать заметку</h1>
                  <form class='change' method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Имя:</p>
                    <input type='text' name='name' value='$name' />
                    <p>categoryId:</p>

                    <select name='categoryId' id='category'>";
                    $result_category = $conn->query("SELECT * FROM category");

                    if ($result_category->num_rows > 0) {
                        while ($row_category = $result_category->fetch_assoc()) {
                            //совпадает ли id категории с выбранным categoryId
                            if ($row_category['id'] == $categoryId) {
                                $categorySelected = 'selected';
                            } else {
                                $categorySelected = '';
                            }                            
                            echo "<option value='" . $row_category['id'] . "' $categorySelected>" . $row_category['name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Нет доступных категорий</option>";
                    }
                    echo "</select>

                    <input type='submit' class='btn' value='Сохранить'>
                  </form>";

                    $result_category->free();
                } else {
                    echo "<div>Пользователь не найден</div>";
                }
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }
        } elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["categoryId"])) {
            //отправка измененных данных назад
            $id = $conn->real_escape_string($_POST["id"]);
            $name = $conn->real_escape_string($_POST["name"]);
            $categoryId = $conn->real_escape_string($_POST["categoryId"]);
            $sql = "UPDATE notes SET name = '$name', category_id = '$categoryId' WHERE id = '$id'";
            if ($result = $conn->query($sql)) {
                header("Location: display.php");
            } else {
                echo "Ошибка: " . $conn->error;
            }
        } else {
            echo "Некорректные данные";
        }

        $conn->close();
        ?>
    </body>

    </html>
</body>

</html>