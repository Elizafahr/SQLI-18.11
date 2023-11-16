<?php 
$conn = new mysqli("localhost", "root", "", "testdb10");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM users";
if($result = $conn->query($sql)){
    foreach($result as $row){
         
        $userid = $row["id"];
        $username = $row["name"];
        $userage = $row["age"];
    }
}
?>
