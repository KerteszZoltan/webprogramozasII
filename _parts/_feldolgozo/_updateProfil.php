<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
    echo $fid=$_POST['Fid'];
    echo $Fjelszo=$_POST['Fjelszo'];
    echo $Fuj = md5($Fjelszo);
    $sql="UPDATE `felhasznalok` SET `Fjelszo`='$Fuj' WHERE `FID`='$fid'";
    $result = $conn->query($sql);
    if(!$result){
        echo "nem sikerült a hozzáadás";
    } else{
        $_SESSION['fid']='';

        header("Location: http://localhost/todos/");
    }
}