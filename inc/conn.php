<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mana hamad almakayil";

$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn){
  die("DB Error: ".mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8mb4");
?>
