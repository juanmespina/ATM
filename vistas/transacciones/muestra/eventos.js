$(document).ready(function () {
    let transaccion = new Transaccion();
    let cuenta = new Cuenta();
    cuenta.cargarCuentaPropia();
    $("#formMostrar").on("submit", function (e) {
        e.preventDefault();
        $("#tBodyTrans").empty();
        transaccion.mostrarTransacciones();


    });

    console.log("Muestra de transacciones ready")
});