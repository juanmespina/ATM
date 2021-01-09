$(document).ready(function () {
    let usuario = new Usuario();

    $("#formIniciarSesion").on("submit", function (e) {
        e.preventDefault();
        usuario.iniciarSesion();
        console.log("Form Ready");

    });

    console.log("Doc Ready");
});