<?php
include 'Conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ItName-e']) && isset($_POST['ItLastName-e']) && isset($_POST['ItEmail-e']) && isset($_POST['ItPassword-e']) && isset($_POST['it_name-s'])) {

        $itname = $_POST['ItName-e'];
        $itlastname = $_POST['ItLastName-e'];
        $itemail = $_POST['ItEmail-e'];
        $itpassword = $_POST['ItPassword-e'];
        $itname_s = $_POST['it_name-s'];

        // Consulta SQL para actualizar los datos del analista IT
        $sql = "UPDATE ItAnalyst SET ItName = ?, ItLastName = ?, ItEmail = ?, ItPassword = ? WHERE ItName = ?";
        $stmt = $Conexion->prepare($sql);

        if ($stmt === false) {
            echo "Error en la preparación de la consulta";
            exit;
        }

        // Vinculamos las variables, incluyendo la variable `itname_s` para la condición WHERE
        $stmt->bind_param("sssss", $itname, $itlastname, $itemail, $itpassword, $itname_s);

        $executeResult = $stmt->execute();

        if ($executeResult) {
            echo "<script>
                alert('El usuario se ha actualizado con éxito!');
                setTimeout(function() {
                    window.location.href = '../HTML/Dash.php';
                }, 500);
              </script>";
        } else {
            echo "<script>alert('Error al actualizar el usuario');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Todos los campos son obligatorios');</script>";
    }
} else {
    echo "<script>alert('Método de solicitud no válido');</script>";
}

$Conexion->close();
