<link rel='stylesheet' type='text/css' href='css/todos.css' />
<?php 
if(!isset($_SESSION)){
    session_start();
}
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
include_once "_parts/functions.php";
?>
<div class='todoHead'>
    <p>Teendő Hozzáadása</p>
    <form method='post' action='_parts/_feldolgozo/_newTodo.php'>
        <input type='text' name='Tnev' placeholder="Teendőd nevét" required><br>
        <textarea class="texta" name='Tleiras' placeholder="Teendő leírása"></textarea><br>
        <input type='submit' value='TODO hozzáadása'/>
    </form>
</div>
<div class='main_page'>
   <?php 
   $fid=$_SESSION['fid'];
   $sql= "SELECT * FROM todos WHERE FID = $fid and TActive > 0";
   $result = $conn -> query($sql);
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           ?><div class="elements">
             <form action="_parts/_feldolgozo/_deleteTodo.php" method="post">
            <?php
           echo $row["TID"]." | ";
           echo $row["FID"]." | ";
           echo $row["Tnev"]." | ";
           echo $row["Tleiras"]." | ";
           
           echo "<button type='submit' name='id' value='".$row["TID"]."'>Törlés</button>";
            ?>
            </form>
        </div>
        <?php
       }
    }
   ?> 
</div>

<div class='footer'>
<?php include_once "footer.php"?>
</div>