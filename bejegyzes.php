<link rel='stylesheet' type='text/css' href='css/bejegyzes.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}
if($fid!=null){

include_once "_parts/kapcsolat.php";
include_once "top_nav.php";

$bid=null;
if(isset($_POST['bid'])){
    $bid=$_POST['bid'];
}else{
    $bid="Üres";
}
if(isset($_POST['delID'])){
echo $id=$_POST['delID'];
echo $delete="DELETE from `bejegyzesek` WHERE BID='$id'";
$resultdel = $conn->query($delete);
header("Location: http://localhost/todos/naplo.php");
}

if (isset($_POST['mid'])) {
    $id = $_POST['mid'];
    $tema = $_POST['tema'];
    $bejegyzes = $_POST['bejegyzes'];
    $date = date("Y.m.d h:i:s");
    $sql="UPDATE `bejegyzesek` SET `Btema`='$tema', `Bejegyzes`='$bejegyzes', `Bmodositas`='$date' 
    WHERE `BID`='$id'";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Nem sikerült a hozzáadás!";
    }else{
        $bid=$id;
    }
}

$select="SELECT * FROM bejegyzesek WHERE BID='{$bid}'";


?>
<div class="main_page">
    <div class="parts">
    <?php 
    $resultselect = $conn->query($select);
    if ($resultselect->num_rows > 0) {
        while($row = $resultselect->fetch_assoc()) {
            if($row["Bmodositas"]== null )
            {
                echo "<label> Módosítás dátuma: Még nem volt módosítás </label><hr>";
            }else{
                echo "<label> Módosítás dátuma: ".$row["Bmodositas"]."</label><hr>";
            }
            echo "<form action='bejegyzes.php' method='post'>";
            echo "Bejegyzés témája: ";
            echo "<input type='text' name='tema' value='".$row["Btema"]."'> <br>";
            echo "Bejegyzés: <br>";
            echo "<textarea name='bejegyzes'>";
            echo $row["Bejegyzes"];
            echo "</textarea>";
            echo '<input type="hidden" name="mid" value="'.$bid.'"><br>';
            echo '<input type="submit" value="Bejegyzés mentése"/>';
            echo "</form>";
            echo '<form action="bejegyzes.php" method="post">';
            echo '<input type="hidden" name="delID" value="'.$bid.'"/>';
            echo '<input type="submit" value="Bejegyzés törlése"/>';
            echo '</form>';
        }
    }
    ?>
    </div>
</div>
<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}
?>
</div>