<?php
include 'Conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica que el método de solicitud sea POST para asegurarse de que el formulario se haya enviado correctamente.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica que los campos 'usuario', 'asunto-ticket' y 'descripcion' estén definidos en el formulario.
    if (isset($_POST['Username']) && isset($_POST['Useremail']) && isset($_POST['u_area'])) {

        // Asigna los valores enviados del formulario a variables PHP.
        $uname = $_POST['Username'];
        $uemail = $_POST['Useremail'];
        $uarea = $_POST['u_area'];

            // Crea una sentencia SQL para insertar los datos del formulario en la tabla 'IT'
            $sql = "INSERT INTO User (NombreUser, CorreoUser, AreaUser) values(?,?,(SELECT IdArea FROM AreaUser WHERE NombreArea = ? LIMIT 1));";

            // Prepara la consulta SQL en la conexión para evitar inyección de SQL.
            $stmt = $Conexion->prepare($sql);

            // Verifica si la preparación de la consulta fue exitosa.
            if ($stmt === false) {
                echo "Error en la preparación de la consulta";
                exit; // Detiene el script si hubo un error en la preparación.
            }

            // Asocia los valores de las variables PHP a los parámetros de la consulta preparada.
            // Aquí, "sss" indica que los tres parámetros son strings (para $user, $title, $description).
            $stmt->bind_param("sss", $uname, $uemail, $uarea);

            // Ejecuta la consulta SQL preparada.
            $executeResult = $stmt->execute();

            // Verifica si la ejecución de la consulta fue exitosa.
            if ($executeResult) {
                // Muestra un mensaje de éxito al usuario y redirige a otra página después de 500 ms (0.5 segundos).
                echo "<script>
                    alert('El usuario se ha creado con éxito!');
                    setTimeout(function() {
                        window.location.href = '../HTML/Dash.php';
                    }, 500); // Espera 0.5 segundos antes de redirigir
                  </script>";
            } else {
                // Muestra un mensaje de error si no se pudo enviar el ticket.
                echo "<script>alert('Error al crear el usuario');</script>";
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
