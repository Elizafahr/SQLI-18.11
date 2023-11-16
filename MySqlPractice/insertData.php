<?php
$conn = new mysqli("localhost", "root", "", "users");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "INSERT INTO Users (name, login, password) VALUES 
            ('Sam', login1, 414141), 
            ('Ann', login2, 848484), 
            ('Juli', login3, 98989)
            ";
if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>