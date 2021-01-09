class Usuario {


    iniciarSesion() {
        let inf = new FormData();
        inf.append("llave", $("#llave").val().trim());
        inf.append("pin", $("#pin").val().trim());
        inf.append("controlador", "Usuario");
        inf.append("accion", "iniciarSesion");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                if (response == "Usuario o contrasena errado" || response == "Recuerda que contrasena debe tener mas de 6 caracteres" ||
                    response == "Recuerda que usuario debe tener mas de tres letras" || response == "Error en los parametros enviados") {
                    alert(response);
                }
                else {
                    //console.log(response);
                    let usuario = JSON.parse(response);
                    if (window.sessionStorage) {
                        sessionStorage.setItem("idusuario", usuario['id']);
                        sessionStorage.setItem("cedula", usuario['cedula']);
                        sessionStorage.setItem("nivel", usuario['nivel_usuario_id']);
                        sessionStorage.setItem("nombre", usuario['nombre']);
                        sessionStorage.setItem("apellido", usuario['apellido']);
                        if (usuario['nivel_usuario_id'] == 2) {
                            window.location.replace("../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php");
                        } else {

                            window.location.replace("../../../vistas/usuario/usuarioAdmin/usuarioAdmin.php");
                        }

                        alert("Bienvenido ");
                    } else {
                        alert('Tu Browser no soporta sessionStorage!');
                    }
                }


            }

        });
    }
    cerrarSesion() {
        let inf = new FormData();
        inf.append("cedula", sessionStorage.getItem("cedula"));
        inf.append("idusuario", sessionStorage.getItem("idusuario"));
        inf.append("accion", "cerrarSesion");
        inf.append("controlador", "Usuario")
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                if (response == true) {
                    sessionStorage.removeItem("idusuario");
                    sessionStorage.removeItem("cedula");
                    sessionStorage.removeItem("nivel");
                    sessionStorage.removeItem("nombre");
                    sessionStorage.removeItem("apellido");
                    window.location.replace("../../../index.php");
                } else {
                    alert(response);
                }

            },
            ajaxError: function (response) {
                console.log(response);
            },
            async: false

        });
    }
    crearUsuario() {
        let inf = new FormData();
        inf.append("accion", "crearUsuario");
        inf.append("controlador", "Usuario")
        inf.append("nombre", $("#nombre").val().trim());
        inf.append("apellido", $("#apellido").val().trim());
        inf.append("cedula", $("#cedula").val().trim());

        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                if (response == true) {
                    alert("Usuario creado");

                }
                else {
                    alert(response);

                }
            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });
    }
    buscarUsuario() {

        let inf = new FormData();
        inf.append("controlador", "Usuario");
        inf.append("accion", "buscarUsuario");
        inf.append("cedula", $("#cedulaBuscar").val().trim());
        console.log($("#cedulaBuscar").val());
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {

                switch (response) {
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    case 'Usuario no registrado':
                        alert(response);
                        break;
                    default:
                        let usuario = JSON.parse(response);
                        $("#tBodyUsuario").append("<tr class='text-center'><td>" + usuario.id + "</td><td>" + usuario.cedula + "</td><td>" + usuario.nombre + "</td><td>" + usuario.apellido
                            + "</td><td>" + usuario.activo + "</td><td><button class='btn btn-outline-danger' id='desactivarCuenta'>Desactivar Cuenta</button></td></tr>");

                        break;
                }

            }

        });
    }
    desactivarUsuario() {
        let inf = new FormData();
        inf.append("controlador", "Usuario");
        inf.append("accion", "desactivarUsuario");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {

                if (response == true) {
                    alert("Desactivado con exito");
                } else {

                    alert(response);
                }

            }

        });
    }
}