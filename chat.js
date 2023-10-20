// chat.js
$(document).ready(function () {
    // Función para cargar mensajes anteriores del chat
    function cargarMensajes() {
        $.ajax({
            url: "obtener_mensajes.php",
            type: "GET",
            success: function (data) {
                $("#chat").html(data);
            }
        });
    }

    // Cargar mensajes anteriores cuando se carga la página
    cargarMensajes();

    // Enviar mensaje
    $("#chat-form").on("submit", function (e) {
        e.preventDefault();
        var mensaje = $("#mensaje").val();
        $.ajax({
            url: "guardar_mensaje.php",
            type: "POST",
            data: { mensaje: mensaje },
            success: function (data) {
                cargarMensajes(); // Cargar mensajes actualizados
                $("#mensaje").val(""); // Limpiar el campo de entrada
            }
        });
    });
});
