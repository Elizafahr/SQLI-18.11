<h2>Список пользователей</h2>
<?php
$conn = mysqli_connect("localhost", "root", "", "testdb10");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Users";
if($result = mysqli_query($conn, $sql)){
    echo "<table><tr><th>Имя</th><th>Возраст</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td><a href='update1.php?id=" . $row["id"] . "'>Изменить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>