<?php
$conn = new mysqli("localhost", "root", "");

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Создание базы данных
$databaseName = 'users_db';
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
$mysqli->query($createDatabaseQuery);

// Переключение на созданную базу данных
$mysqli->select_db($databaseName);

// Создание таблицы
$createTableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
$mysqli->query($createTableQuery);

echo "База данных и таблица успешно созданы.";

// Закрытие соединения
$mysqli->close();
?>