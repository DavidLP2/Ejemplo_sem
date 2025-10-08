<?php
$servername = "localhost"; // Cambia "localhost" si es necesario
$username = "root"; // Cambia "root" si es necesario
$password = ""; // Cambia la contraseña si es necesario
$dbname = "ejemplo_sem"; // Cambia "ejemplo" por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>