<?php
$conn = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}


//create
$sql1 = "CREATE TABLE category (
id INTEGER AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30)
)";

if ($conn->query($sql1)) {
    echo '<br>' .  "Таблица category успешно создана";
} else {
    echo '<br>' . "Ошибка: " . $conn->error;
}

$sql = "CREATE TABLE notes (
id INTEGER AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30),
category_id INT,
FOREIGN KEY (category_id) REFERENCES category(id)
)";

if ($conn->query($sql)) {
    echo '<br>' . "Таблица notes успешно создана";
} else {
    echo '<br>' . "Ошибка: " . $conn->error;
}


//add data
$sql = "INSERT INTO category (name) VALUES
('film'),
('multfilm'),
('book')";
if ($conn->query($sql)) {
    echo '<br>' . "Данные успешно добавлены";
} else {
    echo '<br>' . "Ошибка: " . $conn->error;
}

$sql1 = "INSERT INTO notes (name, category_id) VALUES
('золушка', 1),
('буратино',1),
('колобок', 2)";
if ($conn->query($sql1)) {
    echo '<br>' . "Данные успешно добавлены";
} else {
    echo '<br>' . "Ошибка: " . $conn->error;
}

$conn->close();
