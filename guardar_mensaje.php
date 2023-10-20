<?php
// require_once "config/conexion.php";

// session_start();
// $usuario = $_SESSION['username'];

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $mensaje = $_POST['mensaje'];

//     $sql = "INSERT INTO mensajes (usuario_id, contenido, tipo, fecha) VALUES (?, ?, 'texto', NOW())";
//     $stmt = $conexion->prepare($sql);
//     $stmt->bind_param('ss', $_SESSION['user_id'], $mensaje);

//     if ($stmt->execute()) {
//         echo "Mensaje enviado con éxito.";
//     } else {
//         echo "Error al enviar el mensaje.";
//     }

//     $stmt->close();
// }
