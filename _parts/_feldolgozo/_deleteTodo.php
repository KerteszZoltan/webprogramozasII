<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_POST["id"])){
    echo $tid = $_POST["id"];
    $sql= "UPDATE `todos` SET `TActive`='0' WHERE TID='$tid'";
    $result = $conn->query($sql);
    header("Location: http://localhost/todos/todos.php");
}else {
    header("Location: http://localhost/todos/todos.php");
}
?>