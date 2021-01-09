$(document).ready(function () {
    let transaccion = new Transaccion();
    let cuenta = new Cuenta();
    let servicios = new Servicios();
    servicios.cargarServicios();
    cuenta.cargarCuentaPropia();
    $("#formServicios").on("submit", function (e) {
        e.preventDefault();
        if (confirm("¿Estás seguro?")) {
            transaccion.pagarServicio();

        }

      
    });
    $('#modalRecibo').on('hide.bs.modal', function () {
        window.location.replace("../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php");
    });
    $("#btnGenerarTicket").on("click", function () {

        transaccion.generarTicket();
       
    });
    console.log("Servicios ready")
});