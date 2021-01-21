<?php
include "../kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}

echo $Knev = $_POST['Kat'];
echo "<br>";
$fid=$_SESSION['fid'];

$nevCheck = $conn->query( "SELECT * FROM kategoriak WHERE Knev = '{$Knev}' ");
if($nevCheck->num_rows > 0){
    echo "Már létező Kategoria név!";
    ?>
    <br><a href="http://localhost/todos/kategoriak.php">Vissza a Kategoriak oldalra</a>
    <?php
    }else{
        $sql ="INSERT INTO kategoriak (Knev) 
	    VALUES ('{$Knev}')";
        $result = $conn->query($sql);
        if(!$sql){
        echo "sikertelen<br>";
        echo '<a href="http://localhost/todos/kategoriak.php">Vissza a Kategoriak oldalra</a>';
        }else{
        //echo "Sikeres Kategoria Hozzáadása!";	
        header("Location: http://localhost/todos/kategoriak.php");
        }
    }
?>