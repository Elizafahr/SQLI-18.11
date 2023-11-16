<form action="">
<?php
$conn = new mysqli("localhost", "root", "", "testdb10");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT id, name FROM Users";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><a href='5.php?id=" . $row["id"] . "'>Подробнее</a></td>";
        echo "</tr>";
    }
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
 
echo "</table>";
?>
</form>