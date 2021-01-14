<link rel='stylesheet' type='text/css' href='css/kepek.css' />
<?php
include_once "_parts/kapcsolat.php";
include_once "top_nav.php";
if(!isset($_SESSION)){
  session_start();
  $fid = $_SESSION['fid'];
}
?>
<div class="kepfeltoltes">
<form action="kepek.php" method="post" enctype="multipart/form-data">
  Kérlek Válaszd ki a képet
  <input type="file" name="file">
  <input type="submit" value="Upload Image" name="submit">
</form>
</div>
<?php

if(!empty($_FILES['file'])){
  $minsize=10000;
  if(($_FILES['file']['size'] <= $minsize) || ($_FILES["file"]["size"] == 0)) {
    echo 'Kicsi a méret<br>';
}else{
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7-1571494241.jpg
$source       = $_FILES["file"]["tmp_name"];
$destination  = "kepek/{$basename}";
move_uploaded_file( $source, $destination );
$sql ="INSERT INTO kepek (FID,kep) 
	   VALUES ('{$fid}','{$basename}')";
$result = $conn->query($sql);
header("Location: http://localhost/todos/kepek.php");

if(!$sql){
    echo "sikertelen";
}
}
}
?>
Feltöltött képek:
