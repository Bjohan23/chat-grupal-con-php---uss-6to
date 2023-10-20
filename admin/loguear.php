
<?php
include("../config/conexion.php");
session_start();

$nombre = $_POST['nombre'];
$clave = $_POST['contraseña'];

$q = "SELECT id FROM admins WHERE nombre= '$nombre' AND contraseña = '$clave'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if ($array) {
    $_SESSION['username'] = $nombre;
    $_SESSION['user_id']  = $array['id']; // Almacena la ID del nombre en una variable de sesión
    $_SESSION['pri']      = $array['privilegios'];
    header("location: index.php");
} else {
    echo "DATOS INCORRECTOS";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
