<?php
$conn = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql1 = "CREATE TABLE category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30)
 )";
 if($conn->query($sql1)){
    echo "Таблица category успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}
$sql = "CREATE TABLE notes (
           id INTEGER AUTO_INCREMENT PRIMARY KEY,
           name VARCHAR(30),
           FOREIGN KEY (category_id)
        )";


if($conn->query($sql)){
    echo "Таблица notes успешно создана";
} else{
    echo "Ошибка: " . $conn->error;
}


// Insert Data Query
$sql = "INSERT INTO category (name) VALUES 
            ('first'), 
            ('sec'), 
            ('third')";

if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$sql1 = "INSERT INTO notes (name, category_id) VALUES 
            ('first', 1), 
            ('sec', 0),";


$conn->close();
?>