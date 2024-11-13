<?php
include 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user =  $_POST['username'];
    $pass =  $_POST['password'];

    $sql = "SELECT * FROM ItAnalyst WHERE ItEmail = ? AND ItPassword = ?";
    $stmt = $Conexion->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header('Location: ../HTML/Dash.php');
        exit;
    } else {
        echo "Correo o contraseña incorrectos.";
    }
} else {
    echo "Error en la consulta: " . $Conexion->error;
}

$Conexion->close();

?>$logfile = 'login.log';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user =  $_POST['username'];
    $pass =  $_POST['password'];

    $sql = "SELECT * FROM ItAnalyst WHERE ItEmail = ? AND ItPassword = ?";
    $stmt = $Conexion->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $log = date('Y-m-d H:i:s') . " - Login successful for user $user\n";
        file_put_contents($logfile, $log, FILE_APPEND);
        header('Location: ../HTML/Dash.php');
        exit;
    } else {
        $log = date('Y-m-d H:i:s') . " - Login failed for user $user\n";
        file_put_contents($logfile, $log, FILE_APPEND);
        echo "Correo o contraseña incorrectos.";
    }
} else {
    $log = date('Y-m-d H:i:s') . " - Error en la consulta: " . $Conexion->error . "\n";
    file_put_contents($logfile, $log, FILE_APPEND);
    echo "Error en la consulta: " . $Conexion->error;
}

$Conexion->close();