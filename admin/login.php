<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión | admni</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Iniciar sesión</h2>
                <form action="loguear.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" name="contraseña" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <a  href="../index.php" class="btn btn-secondary">Ir a inicio</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
    
<?php 
include("../usuario/boostrap.php");
?>

</body>
</html>
