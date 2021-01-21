<title> TODO's </title>
<link rel='stylesheet' type='text/css' href='css/index.css' />
<?php
include_once "_parts/kapcsolat.php";
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['fid'])){
    $fid='';
}
else{
    $fid=$_SESSION['fid'];
}

if(!empty($_POST['fnev'])){
$fnev=$_POST['fnev'];
$jelszo=md5($_POST['fjelszo']);
$sql = "SELECT * FROM `felhasznalok` WHERE Fnev='$fnev' AND Fjelszo='$jelszo'";
$result = $conn -> query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $_SESSION['fid'] = $row["FID"];
    header("Location: http://localhost/todos/todos.php");
  }
}
else{
    echo "<hr><p style='text-align:center;'>Hibás bejelentkezés!<br> Elrontott felhasználónév/jelszó! <br>
                                                    Kérlek próbáld újra vagy regisztrálj!<hr>";
}
}


echo "<div class='main_page'>";
    echo "<div class='part'>";
    echo "Bejelentkezés<br>";
    if($fid==''){		
        echo "<form method='post' action='index.php'>";
        echo "Felhasználónév: <br><input type='text' name='fnev'><br>";
        echo "Jelszó: <br><input type='password' name='fjelszo'><br>";
        echo "<input type='submit' value='Bejelentkezés'>";
        echo "</form>";
    }
    else{
        header("Location: todos.php");
    }
    echo "</div>";
    
    echo "<div class='part'>";
    echo "Regisztráció";
    if($fid==''){		
        echo "<form method='post' action='_parts/_feldolgozo/_register.php'>";
        echo "Felhasználónév: <br><input type='text' name='fnev'><br>";
        echo "Jelszó: <br><input type='password' name='fjelszo'><br>";
        echo "<input type='submit' value='Regisztráció'>";
        echo "</form>";
    }
    else{
        header("Location: todos.php");
    }
    echo "</div>";
echo "</div>";
?>