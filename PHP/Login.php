<?php
    include 'Conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user =  $_POST['username'];
        $pass =  $_POST['password'];

        $sql = "SELECT * FROM User WHERE UserEmail = ? AND UserPassword = ?";
        $stmt = $Conexion->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Bienvenido!";
        } else {
            // Error en login
            echo "Correo o contraseña incorrectos.";
        }
    }else {
        echo "Error en la consulta: " . $Conexion->error;
    }

$Conexion->close();

?>