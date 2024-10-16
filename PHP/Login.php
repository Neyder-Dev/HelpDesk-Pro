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
            header('Location: /HelpDesk-Pro/HTML/Home.html');            exit;
        } else {
            // Error en login
            echo "Correo o contraseña incorrectos.";
        }
    }else {
        echo "Error en la consulta: " . $Conexion->error;
    }

$Conexion->close();

?>