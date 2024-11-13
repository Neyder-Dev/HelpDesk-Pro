<?php
// Incluye el archivo 'Conexion.php' que contiene la conexión a la base de datos.
include 'Conexion.php';

// Verifica que el método de solicitud sea POST para asegurarse de que el formulario se haya enviado correctamente.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica que los campos 'usuario', 'asunto-ticket' y 'descripcion' estén definidos en el formulario.
    if (isset($_POST['usuario']) && isset($_POST['asunto-ticket']) && isset($_POST['descripcion'])) {

        // Asigna los valores enviados del formulario a variables PHP.
        $user = $_POST['usuario'];
        $title = $_POST['asunto-ticket'];
        $description = $_POST['descripcion'];

        // Define la consulta SQL para insertar un nuevo ticket en la base de datos.
        // El campo `IdUsuario` se obtiene al buscar en la tabla 'user' el 'IdUser' correspondiente al 'NombreUser' proporcionado.
        $sql = "INSERT INTO `Ticket` (`IdTicket`, `IdUsuario`, `TituloTicket`, `IdEstado`, `FechaCreacion`, `FechaActualizacion`, `FechaResuelto`, `IdResolutor`, `DescripcionTicket`) 
                VALUES (NULL, 
                    (SELECT IdUser FROM user WHERE NombreUser = ? LIMIT 1), 
                    ?, '1', current_timestamp(), NULL, NULL, '2', ?)";

        // Prepara la consulta SQL en la conexión para evitar inyección de SQL.
        $stmt = $Conexion->prepare($sql);
        
        // Verifica si la preparación de la consulta fue exitosa.
        if ($stmt === false) {
            echo "Error en la preparación de la consulta";
            exit; // Detiene el script si hubo un error en la preparación.
        }

        // Asocia los valores de las variables PHP a los parámetros de la consulta preparada.
        // Aquí, "sss" indica que los tres parámetros son strings (para $user, $title, $description).
        $stmt->bind_param("sss", $user, $title, $description);
        
        // Ejecuta la consulta SQL preparada.
        $executeResult = $stmt->execute();

        // Verifica si la ejecución de la consulta fue exitosa.
        if ($executeResult) {
            // Muestra un mensaje de éxito al usuario y redirige a otra página después de 500 ms (0.5 segundos).
            echo "<script>
                    alert('El ticket se ha enviado con éxito!');
                    setTimeout(function() {
                        window.location.href = '../HTML/Dash.php';
                    }, 500); // Espera 0.5 segundos antes de redirigir
                  </script>";
        } else {
            // Muestra un mensaje de error si no se pudo enviar el ticket.
            echo "<script>alert('Error al enviar el ticket');</script>";
        }

        // Cierra la consulta preparada para liberar recursos.
        $stmt->close();
    } else {
        // Muestra un mensaje de error si falta algún campo obligatorio en el formulario.
        echo "<script>alert('Todos los campos son obligatorios');</script>";
    }
} else {
    // Muestra un mensaje de error si el método de solicitud no es POST.
    echo "<script>alert('Método de solicitud no válido');</script>";
}

// Cierra la conexión a la base de datos.
$Conexion->close();
?>
