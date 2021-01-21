<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_POST["fid"])){
    echo $fid = $_POST["fid"];
    $sql= "DELETE from `felhasznalok` WHERE FID='$fid'";
    $result = $conn->query($sql);
    $_SESSION['fid']='';
    header("Location: http://localhost/todos/");
}else {
    header("Location: http://localhost/todos/profil.php");
}
?>