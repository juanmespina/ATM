class Cuenta {

    cargarCuentaPropia() {
        let inf = new FormData();
        inf.append("controlador", "Cuenta");
        inf.append("accion", "cargarCuentaPropia");
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
                    case 'No posee cuentas':
                        alert(response);
                        break;
                    default:
                        let cuentas = JSON.parse(response);
                        for (let i = 0; i < cuentas.length; i++) {

                            $("#cuentas").append("<option id=" + cuentas[i].numero + " > Cta " + cuentas[i].tipo + " #" + cuentas[i].numero + ". Disponibles " + cuentas[i].saldo + " Bs</option>");
                        }

                        break;
                }

            }

        });
    }
    cargarTipoCuenta() {
        let inf = new FormData();
        inf.append("controlador", "Cuenta");
        inf.append("accion", "cargarTipoCuenta");
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
                    case 'No posee cuentas':
                        alert(response);
                        break;
                    default:
                        let tipoCuenta = JSON.parse(response);
                        for (let i = 0; i < tipoCuenta.length; i++) {
                            $("#tipoCuenta").append("<option id=" + tipoCuenta[i].id + " > Cta " + tipoCuenta[i].tipo + "</option>");
                        }

                        break;
                }

            }

        });
    }
    crearCuenta() {

        let inf = new FormData();
        inf.append("accion", "crearCuenta");
        inf.append("controlador", "Cuenta");
        inf.append("tipoCuenta", $("#tipoCuenta option:selected").attr("id"));
        inf.append("cedula", $("#cedula").val().trim());
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                alert(response);
            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });
    }
    buscarCuentas() {
        let inf = new FormData();
        inf.append("controlador", "Cuenta");
        inf.append("accion", "buscarCuentas");
        inf.append("cedulaBuscarCuentas", $("#cedulaBuscarCuentas").val().trim());
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
                    case 'No tiene cuentas registradas':
                        alert(response);
                        break;
                    default:
                        let cuenta = JSON.parse(response);
                        for (let i = 0; i < cuenta.length; i++) {

                            $("#tBodyCuenta").append("<tr class='text-center'><td>" + cuenta[i].id + "</td><td>" + cuenta[i].tipo + "</td><td>" + cuenta[i].numero + "</td><td>" + cuenta[i].cedula + "</td>" +
                                "<td>" + cuenta[i].saldo + "</td><td>" + cuenta[i].activo + "</td><td><button class='btn btn-outline-danger desactivarCuenta' id='"+cuenta[i].numero+"' >Desactivar Cuenta</button></td></tr>");

                        }


                        break;
                }

            }

        });
    }
    desactivarCuenta(idCuenta) {
        let inf = new FormData();
        inf.append("nroCuenta", idCuenta);
        inf.append("controlador", "Cuenta");
        inf.append("accion", "desactivarCuenta");
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

