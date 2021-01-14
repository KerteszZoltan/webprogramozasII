<link rel='stylesheet' type='text/css' href='css/profil.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}

include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
$check = null;
if(!empty($_POST['Fid']))
{
    //echo $_POST['Fid'];
    $ojelszo= $_POST['Ojelszo'];
    $cojelszo = md5($ojelszo);
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
    echo "Felhasználónév : ";
    echo $row["Fnev"].'<br>';
    echo "Add meg a régi jelszót:";
    echo '<input type="text" name="Ojelszo"/ required>';
    echo '<button type="submit" name="Fid" value="'.$fid.'"> Jelszó módosítása </button>';
    echo '</form>';
            }
        }
    }else{
    if ($resultSelect->num_rows > 0) {
        while($row = $resultSelect->fetch_assoc()) {
            echo '<form action="_parts/_feldolgozo/_updateProfil.php" method="post">';
            echo "Felhasználónév : ";
            echo $row["Fnev"].'<br>';
            //echo $row["Fnev"];
            echo "Jelszó : ";
            echo '<input type="text" name="Fjelszo" placeholder="Új jelszó megadása"/>';
            echo '<button type="sumbit" name="Fid" value="'.$fid.'">Mentés</button>';
            echo '</form>';
        }
    }
    }
    ?>
    </div>
</div>
<div class='footer'>
<?php include_once "footer.php"?>
</div>