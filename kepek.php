<link rel='stylesheet' type='text/css' href='css/kepek.css' />
<?php

if(!isset($_SESSION)){
  session_start();
  $fid = $_SESSION['fid'];
}
if($fid!=null){
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
?>
<div class="kepfeltoltes">
<form action="kepek.php" method="post" enctype="multipart/form-data">
  Kérlek Válaszd ki a képet
  <input type="file" name="file">
  <input type="submit" value="Upload Image" name="submit">
</form>
<?php

if(!empty($_FILES['file'])){
  $minsize=100;
  if(($_FILES['file']['size'] <= $minsize) || ($_FILES["file"]["size"] == 0)) {
    echo '<div class="danger">';
    echo 'Kicsi a méret<br>';
    echo '</div>';
}else{
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "-use-" . $_SESSION['fid'] . "." . $extension; // 5dab1961e93a7-1571494241.jpg
$source       = $_FILES["file"]["tmp_name"];
$destination  = "kepek/{$basename}";
move_uploaded_file( $source, $destination );
$insert ="INSERT INTO kepek (FID,kep) 
	   VALUES ('{$fid}','{$basename}')";
$result = $conn->query($insert);
header("Location: http://localhost/todos/kepek.php");

if(!$insert){
    echo "sikertelen";
}
}
}

if(!empty($_POST['KID'])){
  echo $kid = $_POST['KID'];
  $delete = "DELETE from kepek where KID=$kid";
  $resultDelete = $conn->query($delete);
  if (!$delete) {
    echo '<div class="danger">';
    echo "Sikertelen törlés";
    echo '</div>';
  }else{
    echo "Sikeres törlés";
    header("Location: http://localhost/todos/kepek.php");
  }
}
?>

</div>
<div class="main_page">
  <div>
Feltöltött képek:
  </div>
<?php
$select="SELECT * from `kepek` WHERE FID=$fid";
$resultSelect = $conn -> query($select);
if ($resultSelect->num_rows > 0) {
  while($row = $resultSelect->fetch_assoc()) {
    echo '<div class="parts">';
    echo '<img src="kepek/'.$row["kep"].'" alt="Feltoltott kep">';
    echo '<div class="desc">';
    echo '<form action="kepek.php" method="post">';
    echo '<button type="submit" name="KID" value="'.$row["KID"].'">Törlés</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
  }
}else{
  echo "Még nem töltött fel képet!";
}
?>
</div>
<div class='footer'>
<?php include_once "footer.php";}else {echo "ERROR 404";}?>
</div>