<link rel='stylesheet' type='text/css' href='css/kategoriak.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}
if($fid!=null){
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
if (isset($_POST['upload'])) {
    $katid=$_POST['upkatid'];
    $knev=$_POST['kategoria'];
    $update="UPDATE `kategoriak` SET `Knev`='$knev' WHERE `KID`='$katid'";
    $resultupdate = $conn->query($update);
    if($resultupdate){
        header("Location: http://localhost/todos/kategoriak.php");
    }
    else{
        echo "Hiba a frissítésben";
    }
}

if(isset($_POST['delete'])){
    $katiddel = $_POST['delkatid'];
    $delete="DELETE from `kategoriak` where KID='$katiddel'";
    $resultdel = $conn->query($delete);
    if($resultdel){
        header("Location: http://localhost/todos/kategoriak.php");
    }
    else{
        echo "Hiba a frissítésben";
    }
}

?>
<div class='main_page'>
    <?php
    echo "<div class='parts'>";
    echo "<form action='_parts/_feldolgozo/_newKategoria.php' method='post'>";
    echo "Új kategória neve: ";
    echo "<input type='text' name='Kat'/>";
    echo "<input type='submit' value='Új kategória hozzáadása'/>";
    echo "</form>";
    echo "</div>";

    $select="SELECT * from `kategoriak` where Knev != ''";
    $resultSelect = $conn->query($select);
    echo "<label> Kategória neve: </label>";
    $i=1;
            if ($resultSelect->num_rows > 0) {
                while($row = $resultSelect->fetch_assoc()) {
                    
                    echo "<div class='parts'>";
                    echo "<form action='kategoriak.php' method='post'>";
                    echo $i++. " | ";
                    echo "<input type='text' name='kategoria' value='".$row["Knev"]."'>";
                    echo "<input type='hidden' name='upkatid' value='".$row["KID"]."'>";
                    echo "<input type='submit' name='upload' value='Frissítés'/>";
                    echo "<form action='kategoriak.php' method='post'>";
                    echo "<input type='hidden' name='delkatid' value='".$row["KID"]."'>";
                    echo "<input type='submit' name='delete' value='Törlés'/>";
                    echo "</form>";
                    echo "</form>";
                    echo "</div>";


                }
            }
    ?>
</div>
<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}?>
</div>