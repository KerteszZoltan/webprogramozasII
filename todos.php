<link rel='stylesheet' type='text/css' href='css/todos.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
}

include_once "_parts/kapcsolat.php";
include_once "top_nav.php";


if(!empty($_POST))
{
    $tid=$_POST['id'];
    $tnev=$_POST['Tnev'];
    $tleiras=$_POST['Tleiras'];
    $sql= "UPDATE `todos` SET `Tnev`='$tnev',`Tleiras`='$tleiras' WHERE TID=$tid";
    $result = $conn->query($sql);   
}
?>

<div class='todoHead'>
    <form method='post' action='_parts/_feldolgozo/_newTodo.php'>
        <div class='todo part'>
        <input type='text' name='Tnev' placeholder="Add meg teendőd nevét " required><br>
        <textarea class="texta" name='Tleiras' placeholder="Add meg teendőd leírása"></textarea><br>
        <select name="kategoria" id="kategoria">';
        <?php 
        $kats="SELECT * from kategoriak";
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
    <form method='post' action='_parts/_feldolgozo/_newKategoria.php'> 
        <div class='todo part'>
        <input type='text' name='Kat' placeholder="Add meg a kategória nevét"><br>
        <input type='submit' value='Kategória hozzáadása'/>
        </div>

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
           echo "</div>";
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
<?php include_once "footer.php"?>
</div>