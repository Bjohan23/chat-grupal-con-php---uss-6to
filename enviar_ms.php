<?php
session_start();
include("config/conexion.php");

$usuario = $_SESSION['username'];
$usuario_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = $_POST['mensaje'];

    // Verificar si el mensaje está vacío y no se ha subido una imagen
    if (empty($mensaje) && $_FILES['imagen']['size'] == 0) {
        echo "El mensaje está vacío.";
    } else {
        if ($_FILES['imagen']['size'] > 0) {
            // Procesar la imagen
            $imageFileType = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            $permitidos = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($imageFileType, $permitidos)) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES['imagen']['name']);

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFile)) {
                    // La imagen se ha subido correctamente, ahora guardemos el mensaje
                    $sql = "INSERT INTO mensajes (usuario_id, contenido, tipo, imagen, fecha) VALUES (?, ?, 'imagen', ?, NOW())";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param('iss', $usuario_id, $mensaje, $targetFile);

                    if ($stmt->execute()) {
                        header("Location: index.php");
                    } else {
                        echo "Error al enviar el mensaje.";
                    }

                    $stmt->close();
                } else {
                    echo "Error al cargar la imagen.";
                }
            } else {
                echo "Tipo de archivo no permitido. Sube una imagen (jpg, jpeg, png, gif).";
            }
        } else {
            // Si no se cargó una imagen, guarda el mensaje de texto
            $sql = "INSERT INTO mensajes (usuario_id, contenido, tipo, fecha) VALUES (?, ?, 'texto', NOW())";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('is', $usuario_id, $mensaje);

            if ($stmt->execute()) {
                header("Location: index.php");
            } else {
                echo "Error al enviar el mensaje.";
            }

            $stmt->close();
        }
    }
}
?>
