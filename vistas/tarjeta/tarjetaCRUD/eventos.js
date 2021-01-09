$(document).ready(function () {
    let tarjeta = new Tarjeta();
    $("#crearTarjeta").on("submit", function () {
        if (confirm("Estas seguro?")) {


            tarjeta.crearTarjeta();
            $("input[type=text]").val("");
        }

    });
    $("#formBuscarTarjeta").on("submit", function (e) {
        e.preventDefault();
        tarjeta.buscarTarjetas();
        $("#tBodyTarjeta").empty();
        $("input[type=text]").val("");
    });

    $('#modalCrearTarjeta').on('hide.bs.modal', function () {
        $("input[type=text]").val("");
    });
    $(document).on("click", ".desactivarTarjeta", function () {

        if (confirm("Estas seguro?")) {
            tarjeta.desactivarTarjeta($(this).attr("id"));
            $(this).parent().parent().empty();
        }


    });

});