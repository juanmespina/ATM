$(document).ready(function () {
    let tarjeta = new Tarjeta();
    tarjeta.cargarTarjetaPropia();

    $("#formCambiarPin").on("submit", function (e) {
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            tarjeta.actualizarPin();
            $("input[type=text]").val("");
            window.location.replace("../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php");
        }

    });



});