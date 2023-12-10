<?php 

$host = "localhost";
$database = "contactos_app";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database;user=$user;password=$password");
}catch(PDOException $e) {
  die("Error al conectar a la base de datos: " . $e-> getMessage());
}

?>
