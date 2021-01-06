<?php
session_start();
include "../kapcsolat.php";

$jelszo		= $_REQUEST['fjelszo'];
$nev		= $_REQUEST['fnev'];

$nevCheck = $conn->query( "SELECT * FROM felhasznalok WHERE Fnev = '{$nev}' ");

    if($nevCheck->num_rows > 0){
        echo "Már létező felhasználónév!";
        //die("MySQL query failed!" . mysqli_error($conn));
        ?>
        <br><a href="http://localhost/todos">Vissza a Főoldalra</a>
        <?php
		}
	else{
		$sql ="INSERT INTO felhasznalok (Fnev, Fjelszo) 
				VALUES ('{$nev}', '{$jelszo}')";
        $result = $conn->query($sql);
        echo "Sikeres regisztráció!";	
        header("Location: http://localhost/todos");
        }
?>