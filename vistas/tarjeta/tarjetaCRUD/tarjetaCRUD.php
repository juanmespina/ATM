<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">
        <!-- Modal -->
        <div class="modal fade" id="modalCrearTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Tarjeta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="crearTarjeta">
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="cedula">Cedula</label>
                                    <input id="cedula" class="form-control" type="text" name=""  pattern="[0-9]{7,9}" required>
                                    <label for="pin">Pin</label>
                                    <input id="pin" class="form-control" type="text" name="" pattern="[0-9]{4}" required >
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" form="crearTarjeta" id="btnCrearTarjeta">Crear Tarjeta</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-around">
                <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modalCrearTarjeta">Crear Tarjeta</button>
                <form class="form-inline" id="formBuscarTarjeta">
                    <input id="cedulaBuscarTarjetas" type="text" class="form-control mx-1" placeholder="Buscar por numero de cedula" name="#cedulaBuscarTarjetas" pattern="[0-9]{7,9}">
                    <input class="btn btn-outline-primary " type="submit" value="Buscar" >
                </form>
            </div>



        </div>
        <div class="row justify-content-center my-5">
            <div class="col-10 bg-light  justify-content-center m-3">
                <table class="table table-light text-dark">
                    <thead>
                        <tr class="text-center">
                            <td>Id Tarjeta</td>
                            <td>Numero de tarjeta</td>
                            <td>Cedula Usuario</td>
                            <td>Activo(1 para si, 0 para no)</td>
                            <td>Desactivar</td>
                        </tr>
                    </thead>
                    <tbody id="tBodyTarjeta">

                    </tbody>
                </table>

            </div>
        </div>

        <script src="../../../assets/jquery-3.3.1.js"></script>
        <script src="../Tarjeta.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>

    </div>

</body>

</html>