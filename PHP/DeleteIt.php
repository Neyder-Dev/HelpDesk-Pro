<?php
include 'Conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si el nombre está presente en la solicitud
    if (isset($_POST['it_name-s-d']) && !empty($_POST['it_name-s-d'])) {
        $itname = $_POST['it_name-s-d'];

        // Consulta SQL para eliminar los datos del analista IT
        $sql = "DELETE FROM ItAnalyst WHERE ItName = ?";
        $stmt = $Conexion->prepare($sql);

        if ($stmt === false) {
            echo "Error en la preparación de la consulta";
            exit;
        }

        // Vinculamos las variables
        $stmt->bind_param("s", $itname);

        $executeResult = $stmt->execute();

        if ($executeResult) {
            echo "<script>
                alert('El usuario ha sido eliminado con éxito!');
                setTimeout(function() {
                    window.location.href = '../HTML/Dash.php';
                }, 500);
              </script>";
        } else {
            echo "<script>alert('Error al eliminar el usuario: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Nombre del analista no proporcionado');</script>";
    }
} else {
    echo "<script>alert('Método de solicitud no válido');</script>";
}

$Conexion->close();
?>
