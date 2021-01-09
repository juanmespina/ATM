<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>


    <div class="container-fluid my-5">
        <div class="modal fade" id="modalRecibo" tabindex="-1" role="dialog">

            <!-- Modal-->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Resumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="cuerpoModal">
                        <div class="container-fluid" id="contenedorModal">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGenerarTicket">Generar Ticket</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-7 bg-light border border-primary justify-content-center m-3">
                <h2>Pago de Servicios</h2>

                <form method="post" id="formServicios" class=" mt-3">
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cuentas">Tus Cuentas</label>
                                <select id="cuentas" class="form-control" name="" required>
                                    <option value="" disabled selected>Seleccione una cuenta...</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="servicios">Tus servicios</label>
                                <select id="servicios" class="form-control" name="" required>
                                    <option value="" disabled selected>Seleccione un servicio...</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-6">
                            <label for="monto">Monto a pagar</label>
                            <input id="monto" class="form-control" type="text" name="" required pattern="[0-9]{1,}">
                        </div>
                        <div class="col-6">
                            <label for="codigo">Numero de telefono o contrato</label>
                            <input id="codigo" class="form-control" type="text" name="" pattern="[0-9]{11}" required>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-outline-primary my-2 float-right" value="Pagar" required>
                </form>
            </div>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRecibo" data-whatever="@mdo">Open modal for @mdo</button> -->

        </div>
        <script src="../Transaccion.js"></script>
        <script src="../../cuenta/Cuenta.js"></script>
        <script src="Servicios.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>



</body>

</html>