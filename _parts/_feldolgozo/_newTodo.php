<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}

$tnev = $_POST['Tnev'];
$tleiras = $_POST['Tleiras'];
echo $fid=$_SESSION['fid'];

$sql ="INSERT INTO todos (FID,Tnev, Tleiras) 
	   VALUES ('{$fid}','{$tnev}', '{$tleiras}')";
$result = $conn->query($sql);
if(!$sql){
    echo "sikertelen";
}else{
//echo "Sikeres regisztráció!";	
header("Location: http://localhost/todos/todos.php");
}
?>