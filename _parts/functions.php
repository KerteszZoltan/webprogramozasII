<?php 
include_once "kapcsolat.php";
function listAll(){
    $fid=$_SESSION['fid'];
    $sql= "SELECT * FROM todos";
    $result = query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["FID"]." | ";
            echo $row["Tnev"];
            echo $row["Tleiras"];
            echo $row["TActive"];
            
        }
    }
}
?>