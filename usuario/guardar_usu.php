<?php
include("../config/conexion.php");
// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$apodo = $_POST['apodo'];
$contrasena = $_POST['contrasena'];


// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, apodo, contraseña) VALUES ('$nombre', '$apodo', '$contrasena')";
if ($conexion->query($sql) === TRUE) {
    echo "¡Registro exitoso! Ahora puedes iniciar sesión.";
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>

