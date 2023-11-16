<?php
$conn = mysqli_connect("localhost", "root", "", "testdb10");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "SELECT * FROM Users WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
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
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"])) {
      
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $username = mysqli_real_escape_string($conn, $_POST["name"]);
    $userage = mysqli_real_escape_string($conn, $_POST["age"]);
      
    $sql = "UPDATE Users SET name = '$username', age = '$userage' WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: 6.1.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
else{
    echo "Некорректные данные";
}
mysqli_close($conn);
?>