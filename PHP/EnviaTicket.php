<?php
include 'Conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario']) && isset($_POST['asunto-ticket']) && isset($_POST['descripcion'])) {
        $user = $_POST['usuario']; // Este será el nombre del usuario
        $title = $_POST['asunto-ticket'];
        $description = $_POST['descripcion'];

        // Usa una subconsulta para obtener el ID del usuario
        $sql = "INSERT INTO `Ticket` (`IdTicket`, `IdUsuario`, `TituloTicket`, `IdEstado`, `FechaCreacion`, `FechaActualizacion`, `FechaResuelto`, `IdResolutor`, `DescripcionTicket`) 
                VALUES (NULL, 
                    (SELECT IdUser FROM user WHERE NombreUser = ? LIMIT 1), 
                    ?, '1', current_timestamp(), NULL, NULL, '2', ?)";

        $stmt = $Conexion->prepare($sql);
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . htmlspecialchars($Conexion->error));
        }

        // Se utiliza "s" para el nombre del usuario y "iss" para el título y descripción
        $stmt->bind_param("sss", $user, $title, $description);
        $executeResult = $stmt->execute();

        if ($executeResult) {
            echo "Se ha creado con éxito el ticket.";
        } else {
            echo "Error al enviar el ticket: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}

$Conexion->close();
