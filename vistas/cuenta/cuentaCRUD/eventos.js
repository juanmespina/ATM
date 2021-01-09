$(document).ready(function () {
    let cuenta = new Cuenta();
    cuenta.cargarTipoCuenta();
    $("#crearCuenta").on("submit", function () {
        if (confirm("Estas seguro?")) {
            cuenta.crearCuenta();
            $("input[type=text]").val("");
        }


    });
    $("#formBuscarCuentas").on("submit", function (e) {
        e.preventDefault();
        cuenta.buscarCuentas();
        $("#tBodyCuenta").empty();
        $("input[type=text]").val("");
    });

    $('#modalCrearCuenta').on('hide.bs.modal', function () {
        $("input[type=text]").val("");
    });
    $(document).on("click", ".desactivarCuenta", function () {
        if (confirm("Estas seguro?")) {
            cuenta.desactivarCuenta($(this).attr("id"));
            $(this).parent().parent().empty();
        }


    });

});