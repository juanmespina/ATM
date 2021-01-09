$(document).ready(function () {
    let transaccion = new Transaccion();
    $("#formMostrar").on("submit", function (e) {
        console.log("Mostrando");
        e.preventDefault();
        $("#tBodyTrans").empty();
        transaccion.mostrarTransaccionesAdmin();


    });

    console.log("Muestra de transacciones de admin ready")
});