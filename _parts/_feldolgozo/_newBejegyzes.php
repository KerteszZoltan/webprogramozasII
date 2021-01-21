<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST['tema']))
{
    echo $felhasznalo=$_SESSION['fid'];
    echo $tema=$_POST['tema'];
    echo $bejegyzes=$_POST['bejegyzes'];
    echo $time=date("Y.m.d-h:i:s");

    $add="INSERT INTO bejegyzesek (FID,Btema,Bejegyzes,Bletrehozas) 
    VALUES ('{$felhasznalo}', '{$tema}', '{$bejegyzes}', '{$time}')";
    $result = $conn->query($add);
    if(!$add){
        echo "Sikertelen hozzáadás";
        echo '<a href="http://localhost/todos/naplo.php">Vissza a napló oldalra</a>';
    }else{
        echo "Sikeres hozzáadás";
        header("Location: http://localhost/todos/naplo.php");
    }
}
?>