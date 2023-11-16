<form action="" method="get">
    <input type="text" name="id">
    <button>тык</button>
<h2>Список пользователей</h2>
<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "", "testdb10");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM Users WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userage = $row["age"];
                echo "<div>
                        <h3>Информация о пользователе</h3>
                        <p>Имя: $username</p>
                        <p>Возраст: $userage</p>
                    </div>";
            }
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>

</form>