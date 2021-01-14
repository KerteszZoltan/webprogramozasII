<?php
include "../kapcsolat.php";

if(!isset($_SESSION)){
    session_start();
}


echo $fnev = $_REQUEST['fnev'];
echo $fjelszo = $_REQUEST['fjelszo'];
$nJ = md5($fjelszo);
$sql="SELECT FID FROM Felhasznalok WHERE Fnev='$fnev' && Fjelszo='$nJ'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo $row["FID"];
    $_SESSION['fid'] = $row["FID"];
    echo $_SESSION['fid'];
    header("Location: http://localhost/todos/todos.php");
  }
} else {
  echo "Hibás felhasználónév vagy jelszó";
  header("Location: http://localhost/todos/");
}

?>