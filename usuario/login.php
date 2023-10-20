<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Iniciar sesión</h2>
                <form action="loguear.php" method="POST">
                    <div class="form-group">
                        <label for="apodo">apodo:</label>
                        <input type="text" name="apodo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" name="contraseña" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <a href="crear_cuenta.php" target="_blank" rel="noopener noreferrer">Crear cuenta</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
    
<?php 
include("boostrap.php")
?>

</body>
</html>
