<form action="" method="get"></form>
<?php
$conn = new mysqli("localhost", "root", "", "testdb10");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Users";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th>Возраст</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'>Изменить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
