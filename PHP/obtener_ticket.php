<?php
include 'Conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'];
$query = "SELECT IdTicket, u.NombreUser, TituloTicket, DescripcionTicket, et.NombreEstado, FechaCreacion, FechaActualizacion, ia.ItName, RespuestaTicket
        FROM Ticket
        INNER JOIN `User` u ON IdUsuario = u.IdUser 
        INNER JOIN `EstadoTicket` et ON Ticket.IdEstado = et.IdEstado 
        INNER JOIN ItAnalyst ia ON IdResolutor = ia.IdIt 
        WHERE NombreEstado != 'Resuelto';";
$result = mysqli_query($Conexion, $query);

if ($result) {
    $ticket = mysqli_fetch_assoc($result);
    echo json_encode($ticket);
} else {
    echo json_encode(["error" => "No se pudo obtener el ticket"]);
}
?>
