<?php
// Incluye el archivo 'Conexion.php' que contiene la conexión a la base de datos.
include 'Conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica que el método de solicitud sea POST para asegurarse de que el formulario se haya enviado correctamente.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica que los campos 'usuario', 'asunto-ticket' y 'descripcion' estén definidos en el formulario.
    if (isset($_POST['ItName']) && isset($_POST['ItLastName']) && isset($_POST['ItEmail']) && isset($_POST['ItPassword']) && isset($_POST['ItPassword1'])) {

        // Asigna los valores enviados del formulario a variables PHP.
        $itname = $_POST['ItName'];
        $itlastname = $_POST['ItLastName'];
        $itemail = $_POST['ItEmail'];
        $itpassword = $_POST['ItPassword'];
        $itpassword1 = $_POST['ItPassword1'];

        if (strcmp($itpassword, $itpassword1) == 0) {
            // Crea una sentencia SQL para insertar los datos del formulario en la tabla 'IT'
            $sql = "INSERT INTO ItAnalyst (ItName, ItLastName, ItEmail, ItPassword) values(?,?,?,?)";

            // Prepara la consulta SQL en la conexión para evitar inyección de SQL.
            $stmt = $Conexion->prepare($sql);

            // Verifica si la preparación de la consulta fue exitosa.
            if ($stmt === false) {
                echo "Error en la preparación de la consulta";
                exit; // Detiene el script si hubo un error en la preparación.
            }

            // Asocia los valores de las variables PHP a los parámetros de la consulta preparada.
            // Aquí, "sss" indica que los tres parámetros son strings (para $user, $title, $description).
            $stmt->bind_param("ssss", $itname, $itlastname, $itemail,  $itpassword);

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
        } else{
            echo "<script>alert('Las contraseñas no coinciden');</script>";
        }
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
