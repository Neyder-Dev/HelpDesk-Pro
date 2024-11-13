<?php
 include 'Conexion.php';

$sql = "SELECT * FROM ItAnalyst;"; 
$result = $Conexion->query($sql);

echo "<option value='' disabled selected>Selecciona</option>";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["ItName"] . "'>" . $row["ItName"] . "</option>";
  }
} else {
  echo "<option>No hay analistas creados</option>";
}

$Conexion->close();
?>
