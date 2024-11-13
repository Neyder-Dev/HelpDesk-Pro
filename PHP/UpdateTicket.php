<?php
include 'Conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $ticket_id = $_POST['idTicket'];  // ID del ticket
    $respuesta = $_POST['respuesta'];  // Respuesta del ticket
    $estado = $_POST['estado'];        // Estado del ticket

    // Preparar la consulta SQL para actualizar el ticket
    $sql = "UPDATE ticket SET RespuestaTicket = ?, IdEstado = ? WHERE IdTicket = ?";

    // Usar prepared statements para evitar inyecciones SQL
    if ($stmt = $Conexion->prepare($sql)) {
        // Asociar parámetros
        $stmt->bind_param("ssi", $respuesta, $estado, $ticket_id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>
                alert('El ticket se ha actualizado con éxito!');
                setTimeout(function() {
                    window.location.href = '../HTML/Dash.php';
                }, 500);
              </script>";
        } else {
            echo "Error al actualizar el ticket: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $Conexion->close();
} else {
    echo "No se recibió el formulario correctamente.";
}
?>
