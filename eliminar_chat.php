<?php
require_once "config/conexion.php"; // Asegúrate de incluir la conexión a la base de datos

// Consulta para eliminar todos los mensajes de la tabla "mensajes"
$sql = "DELETE FROM mensajes";
if ($conexion->query($sql) === TRUE) {
    echo "Todos los mensajes han sido eliminados exitosamente.";
    header("Location: index.php");
} else {
    echo "Error al eliminar mensajes: " . $conexion->error;
}

$conexion->close();
?>
