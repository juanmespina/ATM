$(document).ready(function () {
    let usuario = new Usuario();
    
    document.cookie = "bank=tiempodesesion; max-age=120; path=/";
    setInterval(function () {
        console.log("Cookie");
        $.ajax({
            type: "POST",
            url: "../../../utilidades/cookies.php",
            success: function (response) {
                if (response == true) {
                    console.log("Activo = " + response);
                } else {
                    if (confirm("Tiene mas de dos minutos inactivo, desea extender la sesion?")) {
                        document.cookie = "bank=tiempodesesion; max-age=120; path=/ "
                    } else {
                        document.getElementById('btnCerrarSesion').click()
                    }
                    console.log(response);
                }
            },
            ajaxError: function (response) {
                console.log(response);
            },
            async: false

        });

    }, 120000);
    $("#btnCerrarSesion").on("click", function () {
        usuario.cerrarSesion();

    });
});
