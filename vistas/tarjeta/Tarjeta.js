class Tarjeta {
    cargarTarjetaPropia() {
        let inf = new FormData();
        inf.append("controlador", "Tarjeta");
        inf.append("accion", "cargarTarjetaPropia");
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
                    case 'No posee tarjetas':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let tarjeta = JSON.parse(response);
                        for (let i = 0; i < tarjeta.length; i++) {
                            $("#tarjeta").append("<option id=" + tarjeta[i].numerotarjeta + " >Tarjeta #" + tarjeta[i].numerotarjeta + " </option>");
                        }

                        break;
                }

            }

        });
    }
    crearTarjeta() {
        let inf = new FormData();
        inf.append("accion", "crearTarjeta");
        inf.append("controlador", "Tarjeta");
        inf.append("cedula", $("#cedula").val().trim());
        inf.append("pin", $("#pin").val().trim());
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
    buscarTarjetas() {
        let inf = new FormData();
        inf.append("controlador", "Tarjeta");
        inf.append("accion", "buscarTarjetas");
        inf.append("cedulaBuscarTarjetas", $("#cedulaBuscarTarjetas").val().trim());
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                alert(response);
                switch (response) {
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    case 'Tarjeta no registrada':
                        alert(response);
                        break;
                    default:
                        let tarjeta = JSON.parse(response);
                        
                        for (let i = 0; i < tarjeta.length; i++) {
                        $("#tBodyTarjeta").append("<tr class='text-center'><td>" + tarjeta[i].id + "</td><td>" + tarjeta[i].numerotarjeta + "</td><td>" + tarjeta[i].cedula + "</td><td>" + tarjeta[i].activo + "</td><td><button class='btn btn-outline-danger desactivarTarjeta' id='" + tarjeta[i].numerotarjeta + "'>Desactivar Tarjeta</button></td></tr>");
                        }
                        break;
                }

            }

        });
    }
    desactivarTarjeta(nroTarjeta) {
        let inf = new FormData();
        inf.append("controlador", "Tarjeta");
        inf.append("accion", "desactivarTarjeta");
        inf.append("nroTarjeta",nroTarjeta);
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
    actualizarPin() {
        let inf = new FormData();
        inf.append("accion", "actualizarPin");
        inf.append("controlador", "Tarjeta");
        inf.append("pin", $("#pin").val().trim());
        inf.append("tarjeta", $("#tarjeta option:selected").attr("id"));
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
}