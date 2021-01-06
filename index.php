<title> TODO's </title>
<link rel='stylesheet' type='text/css' href='css/index.css' />
<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['fid'])){
    $fid='';
}
else{
    $fid=$_SESSION['fid'];
}

echo "<div class='main_page'>";
    echo "<div class='part'>";
    echo "Bejelentkezés<br>";
    if($fid==''){		
        echo "<form method='post' action='_parts/_feldolgozo/_login.php'>";
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