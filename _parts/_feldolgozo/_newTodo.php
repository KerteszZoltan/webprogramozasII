<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}

$tnev = $_POST['Tnev'];
$tleiras = $_POST['Tleiras'];
echo $fid=$_SESSION['fid'];
echo $kat=$_POST['kategoria'];
$katid=0;
$sqlKat="SELECT * from kategoriak where Knev='$kat'";
$resultKat = $conn->query($sqlKat);
if ($resultKat->num_rows > 0) {
    while($row = $resultKat->fetch_assoc()) {
        $katid = $row["KID"];
    }
}
$sql ="INSERT INTO todos (FID,Tnev, Tleiras, KID) VALUES ('{$fid}','{$tnev}', '{$tleiras}', '{$katid}')";
$result = $conn->query($sql);
if(!$sql){
    echo "sikertelen";
}else{	
header("Location: http://localhost/todos/todos.php");
}
?>