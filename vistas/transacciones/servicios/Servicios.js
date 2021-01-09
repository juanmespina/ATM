class Servicios {
    cargarServicios() {
        let inf = new FormData();
        inf.append("controlador", "Servicios");
        inf.append("accion", "cargarServicios");
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
                    case 'Problemas al cargar servicios':
                        alert(response);
                        break;
                    default:
                        let servicios = JSON.parse(response);
                        for (let i = 0; i < servicios.length; i++) {
                            console.log(servicios[i].nombre);
                            $("#servicios").append("<option id=" + servicios[i].id + " >  " + servicios[i].nombre + "</option>");
                        }

                        break;
                }

            }

        });
    }

}

