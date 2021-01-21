<link rel='stylesheet' type='text/css' href='css/todos.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
    $fid = $_SESSION['fid'];
}
if($fid!=null){
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";


if(!empty($_POST['id']))
{
    $tid=$_POST['id'];
    $tnev=$_POST['Tnev'];
    $tleiras=$_POST['Tleiras'];
    $kat = $_POST['kategoria'];
    $sql= "UPDATE `todos` SET `Tnev`='$tnev',`Tleiras`='$tleiras', `KID` = '$kat' WHERE TID=$tid";
    $result = $conn->query($sql);   
}
?>

<div class='todoHead'>
    <form method='post' action='_parts/_feldolgozo/_newTodo.php'>
        <div class='todo part'>
        <input type='text' name='Tnev' placeholder="Add meg teendőd nevét " required><br>
        <textarea class="texta" name='Tleiras' placeholder="Add meg teendőd leírása"></textarea><br>
        <select name="kategoria" id="kategoria">
        <option value=""> </option>
        <?php 
        $kats="SELECT * from `kategoriak` where Knev!=''";
        $resultKats = $conn -> query($kats);
        if ($resultKats->num_rows > 0) {
            // output data of each row
            while($row = $resultKats->fetch_assoc()) {
            echo '<option>'.$row["Knev"].'</option>';
            }
        }
        ?>
        </select>
        <input type='submit' value='TODO hozzáadása'/>
        </div>
    </form>
    <form method='post' action='todos.php'> 
        <div class='todo part'>
        <input type='text' name='Katadd' placeholder="Add meg a kategória nevét"><br>
        <?php 
    if(!empty($_POST['Katadd'])){
        $katname=$_POST['Katadd'];
        $katCheck= $conn->query( "SELECT * FROM kategoriak WHERE Knev = '{$katname}' ");
        if($katCheck->num_rows > 0){
            echo "A kategória már létezik<br>";
        }else{
            $count = strlen($katname);
            $min = 4;
            if($count > $min){
            echo $katAdd ="INSERT INTO kategoriak (Knev) 
            VALUES ('{$katname}')";
            $resultKADD = $conn->query($katAdd);
            header("Location: http://localhost/todos/todos.php");
            }else{
                echo "Kérlek adj meg egy kategória nevet<br>A kategóri neve minimum 4 betű<br>";
            }
        }
    }
    ?>
        <input type='submit' value='Kategória hozzáadása'/>
        </form>
        </div>
    </form>
    <form action='kategoriak.php' method='post'>
        <input type='submit' value='Kategóriák'/>
    </form>
</div>
<div class='main_page'>
   <?php 
   $fid=$_SESSION['fid'];
   $sql= "SELECT * FROM todos WHERE FID = $fid and TActive > 0";
   $result = $conn -> query($sql);
   $i=0;
   if(!empty($_POST['sor'])) {
    $sor=$_POST['sor'];
        if(!$sql){
            echo "<div class='warning'>";
            echo "A Frissítés sikertelen";
            echo "</div>";
        }else{
            echo "<div class='success'>";
            echo "Sikeres frissítés ".$sor."-ban";
            echo "</div>";
    }
}

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           
           ?><div class="elements">
            <?php
            $i++;
            $a = $i;
           echo "<div class='elem'>";
           echo '<form action="todos.php" method="post">';
           echo $a;
           echo '<input type="hidden" name="sor" value="'.$a.'"/>';
           echo "</div>";
           echo "<div class='elem'>";
            $kid = $row["KID"];
            $katnev=null;
            $sqlKatid="SELECT * from kategoriak where KID='$kid'";
            $resultKat = $conn->query($sqlKatid);
            if ($resultKat->num_rows > 0) {
                while($rowkat = $resultKat->fetch_assoc()) {
                    $katnev = $rowkat["Knev"];
                }
            }
           echo '<select name="kategoria" id="kategoria">';
           echo '<option value="'.$kid.'">'.$katnev.'</option>';
           $sqlKatall="SELECT * from `kategoriak` where Knev!='' ";
            $resultKatall = $conn->query($sqlKatall);
            if ($resultKatall->num_rows > 0) {
                while($rowkatall = $resultKatall->fetch_assoc()) {
                    echo '<option value="'.$rowkatall["KID"].'">'.$rowkatall["Knev"].'</option>';
                }
            }
           echo '</select>';
           echo '</div>';
           echo "<div class='elem'>";
           echo "<input type='text' name='Tnev' value='".$row["Tnev"]."'/>";
           echo "</div>";
           echo "<div class='elem'>";
           echo "<textarea class='ta' name='Tleiras'>".$row["Tleiras"]."</textarea>";
           echo "</div>";
           echo "<div class='elem'>";
           echo "<button type='submit' name='id' value='".$row["TID"]."'>Frissítés</button>";
           echo "</form>";
           echo "<form action='_parts/_feldolgozo/_deleteTodo.php' method='post'>";
           echo "</div>";
           echo "<div class='elem'>";
           echo "<button type='submit' name='id' value='".$row["TID"]."'>Törlés</button>";
           echo "</div>";
           echo "</form>";
            ?>
        </div>
        <?php
       }
    }
   ?> 
</div>

<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}?>
</div>