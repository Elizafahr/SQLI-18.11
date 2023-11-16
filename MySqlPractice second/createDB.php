<?php
$conn = new mysqli("localhost", "root", "");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
// Создаем базу данных testdb2
$sql = "CREATE DATABASE Fakhrutdinova_SecondTask";
if($conn->query($sql)){
    echo "База данных успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();