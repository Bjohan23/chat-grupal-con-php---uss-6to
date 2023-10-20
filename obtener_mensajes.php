<?php
require_once "config/conexion.php";

$sql = "SELECT u.apodo, m.contenido, m.tipo, m.imagen FROM mensajes m JOIN usuarios u ON m.usuario_id = u.id ORDER BY m.fecha ASC";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row['apodo'] . ":</strong> ";
        if ($row['tipo'] === 'texto') {
            echo $row['contenido'];
        } elseif ($row['tipo'] === 'imagen') {
            echo '<img src="' . $row['imagen'] . '" alt="Imagen" style="max-width: 300px;">';
        }
        echo "</p>";
    }
} else {
    echo "No hay mensajes todavía.";
}

$conexion->close();
?>
