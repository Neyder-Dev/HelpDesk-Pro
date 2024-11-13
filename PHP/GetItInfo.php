<?php
include 'Conexion.php';

if (isset($_GET['it_name'])) {
    $name = $_GET['it_name'];

    // Consulta para obtener los datos del usuario IT por ID
    $query = "SELECT * FROM ItAnalyst WHERE ItName = ?";
    $stmt = $Conexion->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        echo json_encode($userData);
    } else {
        echo json_encode(["error" => "No se encontraron datos para este usuario."]);
    }
    $stmt->close();
}
$Conexion->close();
?>
