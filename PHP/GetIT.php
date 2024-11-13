<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'Conexion.php';

$sql = "SELECT ItName, ItLastName, ItEmail
        FROM ItAnalyst; "; 
$Conexion = $Conexion->query($sql);
$data = array(); // Array donde se guardarán los datos

if ($Conexion->num_rows > 0) {
    // Extraer los datos de cada fila
    while ($row = $Conexion->fetch_assoc()) {
        $data[] = $row;  // Agregar cada fila al array
    }
} else {
    echo "No se encontraron resultados.";
}
// Convertir los datos en formato JSON
echo json_encode($data);
// Cerrar la conexión
$Conexion->close();
