$(document).ready(function () {
    let transaccion = new Transaccion();
    let cuenta = new Cuenta();
    cuenta.cargarCuentaPropia();
    $("#formRetirar").on("submit", function (e) {
        e.preventDefault();
        if (confirm("¿Estás seguro?")) {
            transaccion.retirar();

        }

    });
    $('#modalRecibo').on('hide.bs.modal', function () {
        window.location.replace("../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php");
    });
    $("#btnGenerarTicket").on("click", function () {

        transaccion.generarTicket();
    });
    console.log("Retiro ready")
});