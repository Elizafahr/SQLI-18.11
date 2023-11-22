<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "users_DB_Sec");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Users_1 WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: display.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>