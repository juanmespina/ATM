$(document).ready(function () {
    let usuario = new Usuario();

    $("#formCrearUsuario").on("submit", function () {
        if (confirm("Estas seguro?")) {
            usuario.crearUsuario();
            $("input[type=text]").val("");
        }
     

    });
    $("#formBuscarUsuario").on("submit", function (e) {
        e.preventDefault();
        usuario.buscarUsuario();
        $("#tBodyUsuario").empty();
        $("input[type=text]").val("");
    });

    $('#modalCrearUsuario').on('hide.bs.modal', function () {
        $("input[type=text]").val("");
    });
    $(document).on("click", "#desactivarCuenta", function () {
        usuario.desactivarUsuario();
        $("#tBodyUsuario").empty();

    });

});