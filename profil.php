<link rel='stylesheet' type='text/css' href='css/profil.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}
if($fid!=null){
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
$check = null;
if(!empty($_POST['Fid']))
{
    $cojelszo = md5($_POST['Ojelszo']);
    $sqlCheck="select * from `felhasznalok`";
    $resultCheck = $conn -> query($sqlCheck);
    if ($resultCheck->num_rows > 0) {
        while($row = $resultCheck->fetch_assoc()) {
            if($row["Fjelszo"]==$cojelszo){
                $check = 1;
            break;
            }
        }
    }
    
}

$select="SELECT * from `felhasznalok` where FID=$fid";
$resultSelect = $conn -> query($select);

?>
<div class='main_page'>
<p> Felhasználói adatok </p>
    <div class='parts'>
    <?php 
    if($check == null){
        if ($resultSelect->num_rows > 0) {
            while($row = $resultSelect->fetch_assoc()) {
    echo '<form action="profil.php" method="post">';
    echo "<p>Felhasználónév : ";
    echo $row["Fnev"].'</p><hr>';
    echo "Add meg a régi jelszót:";
    echo '<input type="text" name="Ojelszo"/ required>';
    echo '<button type="submit" name="Fid" value="'.$fid.'"> Profil módosítása </button>';
    echo '</form>';
            }
        }
    }else{
    if ($resultSelect->num_rows > 0) {
        while($row = $resultSelect->fetch_assoc()) {
            echo '<form action="_parts/_feldolgozo/_updateProfil.php" method="post">';
            echo "<p>Felhasználónév : ";
            echo $row["Fnev"].'</p><hr>';
            //echo $row["Fnev"];
            echo "Jelszó : ";
            echo '<input type="text" name="Fjelszo" placeholder="Új jelszó megadása"/>';
            echo '<input type="hidden" name="Fid" value="'.$fid.'"/>';
            echo '<button type="sumbit">Jelszó frissítése</button>';
            echo '</form>';
        }
    }
    echo '<form action="_parts/_feldolgozo/_deleteProfil.php" method="post">';
    echo "Profil térlése : ";
    echo '<button type="submit" name="fid" value="'.$fid.'"> Törlés </button>';
    echo '</form>';
    }
    ?>
    </div>
</div>
<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}
?>
</div>