<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "variedades";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// echo "Conexión exitosa a la base de datos";

?>
