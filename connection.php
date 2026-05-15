<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "autoscout";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Connessione Fallita: " . mysqli_connect_error());
}
?>