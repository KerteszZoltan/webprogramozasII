<?php

$servername = "localhost";
$username = "root";
$password = "";
$databese = "Beadando";
$port ="3308";

$conn = new mysqli($servername, $username, $password, $databese, $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else {
}
?>