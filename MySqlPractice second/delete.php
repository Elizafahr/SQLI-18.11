<?php

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $conn = new mysqli("localhost", "root", "", "Fakhrutdinova_SecondTask");

    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($id);
    $sql = "DELETE FROM notes WHERE id = '$id'";

    if ($result = $conn->query($sql)) {
        header("Location: display.php");
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}


?>