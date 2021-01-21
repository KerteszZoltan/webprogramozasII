<link rel='stylesheet' type='text/css' href='css/naplo.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}
if($fid!=null){
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
?>
<div class="head">
    <form action="_parts/_feldolgozo/_newBejegyzes.php" method="post">
    <p>Új bejegyzés írása:</p><hr>
    <input type="text" name="tema" placeholder="Miről szeretnél írni?" required/>
    <br>
    <textarea name="bejegyzes" placeholder="Bejegyzésed tartalmát írd ide"></textarea><br>
    <button type="submit">Bejegyzés mentése</button>
</form>
</div>
<div class="main_page">
<hr>Eddigi bejegyzések:
    <div class="parts">
        <?php
        $select="SELECT * FROM bejegyzesek WHERE FID='{$fid}'";
        $resultselect = $conn->query($select);
        if ($resultselect->num_rows > 0) {
            while($row = $resultselect->fetch_assoc()) {
                echo '<div class="elem">';
                echo '<form action="bejegyzes.php" method="post">';
                echo '<input type="hidden" name="bid" value="'.$row["BID"].'"/>';
                echo '<button type="submit"> '.$row["Btema"].$row["Bletrehozas"].' </button>';
                echo '</form>';
                echo "</div>";
            }
        }
        ?>
    </div>
</div>
<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}
?>
</div>
