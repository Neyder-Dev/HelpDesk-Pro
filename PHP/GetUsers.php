<?php
 include 'Conexion.php';

$sql = "SELECT NombreUser FROM user;"; // Cambia "usuarios" por el nombre de tu tabla
$result = $Conexion->query($sql);

echo "<option value='' disabled selected>Selecciona</option>";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["NombreUser"] . "'>" . $row["NombreUser"] . "</option>";
  }
} else {
  echo "<option>No hay usuarios disponibles</option>";
}

$Conexion->close();
?>
