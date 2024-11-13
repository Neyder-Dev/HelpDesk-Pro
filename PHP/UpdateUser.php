<?php
include 'Conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica que el método de solicitud sea POST para asegurarse de que el formulario se haya enviado correctamente.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['Username-e']) && isset($_POST['Useremail-e']) && isset($_POST['u_area-e']) && isset($_POST['usuario-e'])) {

        // Asigna los valores enviados del formulario a variables PHP.
        $uname = $_POST['Username-e'];
        $uemail = $_POST['Useremail-e'];
        $uarea = $_POST['u_area-e'];
        $suser = $_POST['usuario-e'];

        // Crea una sentencia SQL para actualizar los datos del usuario en la tabla 'User'
        $sql = "UPDATE User SET NombreUser = ?, CorreoUser = ?, AreaUser = (SELECT IdArea FROM AreaUser WHERE NombreArea = ? LIMIT 1) WHERE NombreUser = ?;";

        // Prepara la consulta SQL en la conexión para evitar inyección de SQL.
        $stmt = $Conexion->prepare($sql);

        // Verifica si la preparación de la consulta fue exitosa.
        if ($stmt === false) {
            echo "Error en la preparación de la consulta";
            exit;
        }

        // Asocia los valores de las variables PHP a los parámetros de la consulta preparada.
        $stmt->bind_param("ssss", $uname, $uemail, $uarea, $suser);

        // Ejecuta la consulta SQL preparada.
        $executeResult = $stmt->execute();

        // Verifica si la ejecución de la consulta fue exitosa.
        if ($executeResult) {
            // Muestra un mensaje de éxito al usuario y redirige a otra página después de 500 ms (0.5 segundos).
            echo "<script>
                alert('El usuario se ha actualizado con éxito!');
                setTimeout(function() {
                    window.location.href = '../HTML/Dash.php';
                }, 500);
              </script>";
        } else {
            // Muestra un mensaje de error si no se pudo actualizar el usuario.
            echo "<script>alert('Error al actualizar el usuario');</script>";
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
