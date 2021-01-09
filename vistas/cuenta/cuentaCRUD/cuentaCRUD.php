<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">
        <!-- Modal -->
        <div class="modal fade" id="modalCrearCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Cuenta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="crearCuenta">
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="cedula">Cedula</label>
                                    <input id="cedula" class="form-control" type="text" name="" required pattern="[0-9]{7,9}">
                                    <label for="tipoCuenta">Tipo de cuenta</label>
                                    <select name="" id="tipoCuenta" class="form-control" required>
                                    <option value="" disabled selected >Seleccionar tipo de cuenta</option>
                                    </select>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" form="crearCuenta" id="btnCrearCuenta">Crear Cuenta</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-around">
                <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modalCrearCuenta">Crear Cuenta</button>
                <form class="form-inline" id="formBuscarCuentas">
                    <input id="cedulaBuscarCuentas" type="text" class="form-control mx-1" name="cedulaBuscarCuentas" placeholder="Buscar cuentas por cedula">
                    <input class="btn btn-outline-primary " type="submit" value="Buscar" >
                </form>
            </div>



        </div>
        <div class="row justify-content-center my-5">
            <div class="col-10 bg-light  justify-content-center m-3">
                <table class="table table-light text-dark">
                    <thead>
                        <tr class="text-center">
                            <td>Id Cuenta</td>
                            <td>Tipo</td>
                            <td>Numero de Cuenta</td>
                            <td>Cedula Usuario</td>
                            <td>Saldo</td>
                            
                            <td>Activo(1 para si, 0 para no)</td>
                            <td>Desactivar</td>
                        </tr>
                    </thead>
                    <tbody id="tBodyCuenta">

                    </tbody>
                </table>

            </div>
        </div>

        <script src="../../../assets/jquery-3.3.1.js"></script>
        <script src="../Cuenta.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>

    </div>

</body>

</html>