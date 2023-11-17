<?php 
$conn = new mysqli("localhost", "root", "", "users_DB");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM Users_1 WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userLogin = $row["loginUsers"];
            }

            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Login:
                    <input type='text' name='loginUsers' value='$userLogin' /></p> <!-- Corrected variable name -->
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
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["loginUsers"])) { // Corrected variable name
    
    $userid = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["name"]);
    $userLogin = $conn->real_escape_string($_POST["loginUsers"]); // Corrected variable name
    $sql = "UPDATE Users_1 SET name = '$username', loginUsers = '$userLogin' WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        header("Location: display.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
</body>
</html>