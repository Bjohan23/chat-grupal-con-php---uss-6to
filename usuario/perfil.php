<?php
session_start();
include("../config/conexion.php");

// Obtener el ID de usuario de la URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id_usuario = $_GET["id"];
} else {
    // Si no se proporciona un ID válido en la URL, redirigir o mostrar un mensaje de error
    // Puedes redirigir al usuario o mostrar un mensaje de error aquí según tus necesidades.
    echo "Error: ID de usuario no válido.";
    exit;
}

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT nombre, apodo,contraseña FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);

// Variables para almacenar los datos del usuario
$nombre = "";
$contraseña = "";
$apodo = "";

// Ejecutar la consulta
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $contraseña = $row["contraseña"];
        $apodo = $row["apodo"];
    } else {
        echo "No se encontraron datos de usuario.";
    }
} else {
    echo "Error al obtener los datos de usuario: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Datos de la Cuenta</title>
    <!-- Agregar el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar una etiqueta meta viewport para la adaptabilidad móvil -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos personalizados (opcional) */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <ul class="nav justify-content-center">
  <li class="nav-item">
  <a href="perfil.php?id=<?php echo $_SESSION['user_id']; ?>" class="nav-link active" category="al">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
      </svg>
      Perfil
  </a>
  </li>


  <!-- falta arreglar  -->
  <li class="nav-item">
    <a class="nav-link" href="../index.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
      <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
    </svg>
    inicio
    </a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>  -->
</ul>
        <div class="form-container">
            <h2>Datos de la Cuenta</h2>
            <form action="actualizar_datos.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="apodo">Apodo:</label>
                    <input type="text" class="form-control" id="apodo" name="apodo" value="<?php echo $apodo; ?>">
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña" value="<?php echo $contraseña; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
            <a href="salir.php" class="btn btn-danger mt-3">Salir</a>
            <a href="../index.php" class="btn btn-secondary mt-3">Página de Inicio</a>
            <!-- Puedes mostrar más información del usuario aquí según tus necesidades -->
        </div>
    </div>

</body>
</html>
