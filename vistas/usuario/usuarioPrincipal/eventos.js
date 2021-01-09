$(document).ready(function () {

    $("#btnMenuPrincipal").css("display", "none");

    $("#transferencia").on("click", function () {
        window.location.replace("../../transacciones/transferencia/transferencia.php");

    });
    $("#deposito").on("click", function () {
        window.location.replace("../../transacciones/deposito/deposito.php");

    });
    $("#retiro").on("click", function () {
        window.location.replace("../../transacciones/retiro/retiro.php");

    });

    $("#servicios").on("click", function () {
        window.location.replace("../../transacciones/servicios/servicios.php");

    });
    $("#mostrar").on("click", function () {
        window.location.replace("../../transacciones/muestra/muestra.php");

    });
    $("#pin").on("click", function () {
        window.location.replace("../../tarjeta/pin/pin.php");

    });




});