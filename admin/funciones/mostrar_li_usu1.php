
<?php
include("../config/conexion.php");
include("../usuario/boostrap.php");


$usuario = $_SESSION['username'];
$id = $_SESSION['user_id'];

// Consulta para obtener la lista de usuarios
$sql = "SELECT * FROM usuarios";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    ?>  
    <div class="container-sm mt-5"> 
          <?php

    echo "<h2>Lista de Usuarios Registrados</h2>";
    
    echo '<table class="table table-bordered table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="centrado" >ID</th>';
    echo '<th class="centrado" >Nombre</th>';
    echo '<th class="centrado" >Apodo</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="centrado" >' . $row["id"] . '</td>';
        echo '<td class="centrado" >' . $row["nombre"] . '</td>';
        echo '<td class="centrado" >' . $row["apodo"] . '</td>';
        ?>
<td class="centrado">
                                <form method="post" action="#" class="d-inline eliminar1 centrado">
                                    <input type="hidden" name="accion" value="pro">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                                    <button class="button">
                                    <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                                    </button>
                                 </form>
                                 <!-- estylo del boton eliminar  -->
                                 <!-- sacado de :https://uiverse.io/vinodjangid07/smart-emu-83 -->
                                 <style>
                                    .button {
                                        width: 50px;
                                        height: 50px;
                                        border-radius: 50%;
                                        background-color: rgb(20, 20, 20);
                                        border: none;
                                        font-weight: 600;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
                                        cursor: pointer;
                                        transition-duration: .3s;
                                        overflow: hidden;
                                        position: relative;
                                        }

                                        .svgIcon {
                                        width: 12px;
                                        transition-duration: .3s;
                                        }

                                        .svgIcon path {
                                        fill: white;
                                        }

                                        .button:hover {
                                        width: 140px;
                                        border-radius: 50px;
                                        transition-duration: .3s;
                                        background-color: rgb(255, 69, 69);
                                        align-items: center;
                                        }

                                        .button:hover .svgIcon {
                                        width: 50px;
                                        transition-duration: .3s;
                                        transform: translateY(60%);
                                        }

                                        .button::before {
                                        position: absolute;
                                        top: -20px;
                                        content: "Eliminar";
                                        color: white;
                                        transition-duration: .3s;
                                        font-size: 2px;
                                        }

                                        .button:hover::before {
                                        font-size: 13px;
                                        opacity: 1;
                                        transform: translateY(30px);
                                        transition-duration: .3s;
                                        }
                                 </style>


                                <td class="centrado">
                                
                                <form method="POST" action="#" class="d-inline editar-form centrado">
                                    <input type="hidden" class="centrado" name="accion" value="pro">
                                    <input type="hidden" class="centrado" name="id" value="<?php echo $data['id']; ?>">
                                    <button class="btn2 centrado">Editar 
                                    <svg class="svg" viewBox="0 0 512 512">
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                                    </button>
                                    <style>
                                        .btn2 {
                                        position: relative;
                                        display: flex;
                                        align-items: center;
                                        justify-content: flex-start;
                                        width: 100px;
                                        height: 40px;
                                        border: none;
                                        padding: 0px 20px;
                                        background-color: rgb(168, 38, 255);
                                        color: white;
                                        font-weight: 500;
                                        cursor: pointer;
                                        border-radius: 10px;
                                        box-shadow: 5px 5px 0px rgb(140, 32, 212);
                                        transition-duration: .3s;
                                        }

                                        .svg {
                                        width: 13px;
                                        position: absolute;
                                        right: 0;
                                        margin-right: 20px;
                                        fill: white;
                                        transition-duration: .3s;
                                        }

                                        .btn2:hover {
                                        color: transparent;
                                        }

                                        .btn2:hover svg {
                                        right: 43%;
                                        margin: 0;
                                        padding: 0;
                                        border: none;
                                        transition-duration: .3s;
                                        }

                                        .btn2:active {
                                        transform: translate(3px , 3px);
                                        transition-duration: .3s;
                                        box-shadow: 2px 2px 0px rgb(140, 32, 212);
                                        }

                                    </style>


                                </form>

                                </td>
                            </td>



<?php
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    ?>
    </div>
    <style>
    .centrado{
    text-align: center;
    vertical-align: middle;
}
</style>
    <?php
} else {
    echo "No hay usuarios registrados.";
}

$conexion->close();
?>
