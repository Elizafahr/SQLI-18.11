<?php
$conn = new mysqli("localhost", "root", "", "testdb10");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "INSERT INTO Users (name, age) VALUES ('Tom', 37)";
if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>