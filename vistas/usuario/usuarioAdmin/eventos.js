$(document).ready(function () {

    $("#btnMenuPrincipal").css("display", "none");

    $("#usuario").on("click", function () {
        window.location.replace("../../usuario/usuarioCRUD/usuarioCRUD.php");

    });
    $("#cuenta").on("click", function () {
        window.location.replace("../../cuenta/cuentaCRUD/cuentaCRUD.php");

    });
    $("#tarjeta").on("click", function () {
        window.location.replace("../../tarjeta/tarjetaCRUD/tarjetaCRUD.php");

    });

    $("#transacciones").on("click", function () {
        window.location.replace("../../transacciones/muestraAdmin/muestraAdmin.php");

    });




});