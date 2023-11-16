<?php
$conn = new mysqli("localhost", "root", "");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
// Создаем базу данных testdb2
$sql = "CREATE DATABASE testdb10";
if($conn->query($sql)){
    echo "База данных успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();

?>