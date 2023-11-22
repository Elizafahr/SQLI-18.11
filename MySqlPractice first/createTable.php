<?php
$conn = new mysqli("localhost", "root", "", "users_DB_Sec");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

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

$sql = "INSERT INTO Users_1 (name, loginUsers, PasswordUsers) VALUES 
            ('Sam', 'login1', '414141'), 
            ('Ann', 'login2', '848484'), 
            ('Juli', 'login3', '98989')";

if($conn->query($sql)){
    echo '<br>'. "Данные успешно добавлены";
} else{
    echo '<br>'."Ошибка: " . $conn->error;
}

$conn->close();
?>