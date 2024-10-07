<?php 
$Conexion = new mysqli("127.0.0.1", "root", "", "Helpdeskpro");
if ($Conexion->connect_error) {
    die("Error de conexión: " . $Conexion->connect_error);
} 
?>
