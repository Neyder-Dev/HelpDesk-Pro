<?php
include 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id-ticket'];

    $sql = "call sp_ConsultaTicket(?)";
    $stmt = $Conexion->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
        // Devolver los datos en formato JSON
        echo json_encode($ticket);
    } else {
        echo json_encode([
            "IdTicket" => $id,
            "TituloTicket" => "No encontrado",
            "DescripcionTicket" => "No se encontró el ticket con ID $id",
            "NombreEstado" => "N/A",
            "ItName" => "N/A"
        ]);
    }
} else {
    echo json_encode([
        "error" => "Error en la consulta: " . $Conexion->error
    ]);
}
$Conexion->close();
?>
