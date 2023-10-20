<?php
session_start();
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_usuario = $_SESSION["user_id"];
    $nuevo_nombre = $_POST["nombre"];
    $nueva_contraseña = $_POST["contraseña"];
    $apodo = $_POST["apodo"];

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre = ?, contraseña = ? , apodo = ? WHERE id= ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $nuevo_nombre, $nueva_contraseña , $apodo,  $id_usuario);

    if ($stmt->execute()) {
        // Los datos se actualizaron con éxito
        header("Location: perfil.php?id=$id_usuario");
        exit;
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si se intenta acceder a esta página sin enviar el formulario, redirigir a perfil.php o mostrar un mensaje de error.
    header("Location: perfil.php?id=$id_usuario");
    exit;
}
?>
