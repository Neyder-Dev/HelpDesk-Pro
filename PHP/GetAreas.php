<?php
 include 'Conexion.php';

$sql = "SELECT * FROM AreaUser;"; 
$result = $Conexion->query($sql);

echo "<option value='' disabled selected>Selecciona</option>";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["NombreArea"] . "'>" . $row["NombreArea"] . "</option>";
  }
} else {
  echo "<option>No hay areas creadas</option>";
}

$Conexion->close();
?>
