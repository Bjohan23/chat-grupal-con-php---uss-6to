<?php require_once "config/conexion.php"; ?>
<?php 
session_start();
$usuario = $_SESSION['username'];
$id = $_SESSION['user_id'];
$pri = $_SESSION['pri'];
?>
<script>
</script>
<?php
if (!isset($usuario)) {
    header("Location: usuario/login.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat en Línea</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-xxl">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                </svg>
                Inicio
            </a>
        </li>
        <li class="nav-item">
            <a href="usuario/perfil.php?id=<?php echo $_SESSION['user_id']; ?>" class="nav-link active" category="al">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>
                Perfil
            </a>
        </li>
        <?php 
        if ($usuario === "admin"){?>
            <li class="nav-item">
                <a class="nav-link active " href="admin/index.php" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                    </svg>    
                    Admin
                </a>
            </li> 
        <?php
        }
        ?>
    </ul>

    <div class="container">

        <h2>SIPAN CHAT</h2>
        <div id="chat-box" style="height: 300px; overflow-y: scroll;">
            <div id="chat"></div>
        </div>
        <br>
        <form method="post" action="enviar_ms.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="apodo">Usuario: </label>
                <?php
                if ($usuario === 'admin') {
                    echo '<strong style="color: red;">' . $usuario . '</strong>';
                } else {
                    echo '<strong>' . $usuario . '</strong>';
                }
                ?>
                <br>
                <?php
                if ($usuario === 'admin') {
                    echo '<strong style="color: red;">' . $pri . '</strong>';
                } else {
                    echo '<strong>' . $pri . '</strong>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <input type="text" class="form-control" id="mensaje" name="mensaje" autocomplete="off" autofocus >
            </div>
            
            <div class="form-group">
                <label for="imagen">Subir Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="usuario/salir.php" class="btn btn-danger">Salir</a>
            <?php 
            if ($usuario === "admin"){?>
                <a class="btn btn-danger" href="eliminar_chat.php" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>   
                    Borrar chat
                </a>
            <?php
            }
            ?>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    function cargarMensajes() {
        $.ajax({
            url: "obtener_mensajes.php",
            type: "GET",
            success: function (data) {
                $("#chat").html(data);
                var chatBox = document.getElementById("chat-box");
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });
    }
    cargarMensajes();
    setInterval(cargarMensajes, 2000);
});
</script>
</body>
</html>
<?php
}
?>
