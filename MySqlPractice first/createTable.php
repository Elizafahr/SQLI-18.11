<?php
$conn = new mysqli("localhost", "root", "", "users_DB");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

// Create Table Query
$sql = "CREATE TABLE Users_1 (
           id INTEGER AUTO_INCREMENT PRIMARY KEY,
           name VARCHAR(30),
           loginUsers VARCHAR(30),
           PasswordUsers VARCHAR(30)
        )";

if($conn->query($sql)){
    echo "Таблица Users успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}

// Insert Data Query
$sql = "INSERT INTO Users (name, loginUsers, PasswordUsers) VALUES 
            ('Sam', 'login1', '414141'), 
            ('Ann', 'login2', '848484'), 
            ('Juli', 'login3', '98989')";

if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>