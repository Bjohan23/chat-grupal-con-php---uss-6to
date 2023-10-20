
<?php require_once "../config/conexion.php"; ?>

<?php 
session_start();
$usuario = $_SESSION['username'];
$id = $_SESSION['user_id'];
$pri = $_SESSION['pri'];

?>
<?php
// Verifica si el usuario ha iniciado sesión
if (!isset($usuario)) {
    header("Location: login.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
    <title>EJEMPLO BOOTSTRAP</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salir.php">Salir</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul> 
             </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
    <div class="container my-3 py-3">
      <!--<div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
          <h1>Bienvenidos 1</h1>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
          <h1>Bienvenidos 2</h1>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <h1>Bienvenidos 3</h1>
        </div>
      </div>-->
      <div class="container">
        <?php include("funciones/mostrar_li_usu1.php"); ?>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


</body>
</html>


<?php 
}
include("../usuario/boostrap.php");
?>