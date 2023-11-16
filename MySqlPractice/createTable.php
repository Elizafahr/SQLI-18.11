<?php
$conn = new mysqli("localhost", "root", "", "users");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "CREATE TABLE Users (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), login VARCHAR(30), password VARCHAR(30);";
if($conn->query($sql)){
    echo "Таблица Users успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>