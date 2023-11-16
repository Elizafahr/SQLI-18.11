<form action="" method="get">
</form>
<?php
// если запрос GET
$conn = new mysqli("localhost", "root", "", "testdb10");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM Users WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userage = $row["age"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Возраст:
                    <input type='number' name='age' value='$userage' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"])) {
      
    $userid = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["name"]);
    $userage = $conn->real_escape_string($_POST["age"]);
    $sql = "UPDATE Users SET name = '$username', age = '$userage' WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        header("Location: 6.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
