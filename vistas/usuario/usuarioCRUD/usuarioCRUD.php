<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">
        <!-- Modal -->
        <div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCrearUsuario">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="" required id="nombre" pattern="[A-Z]{1}+[a-z]{2,15}">

                                </div>
                                <div class="col-6">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="" required id="apellido" pattern="[A-Za-z]{2,20}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input id="cedula" class="form-control" type="text" required name="" pattern="[0-9]{7,9}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" form="formCrearUsuario" id="btnCrearUsuario">Crear Usuario</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-around">
                <button class="btn btn-outline-primary " data-toggle="modal" data-target="#modalCrearUsuario">Crear Usuario</button>
                <form class="form-inline" id="formBuscarUsuario">
                    <input id="cedulaBuscar" type="text" class="form-control mx-1" placeholder="Buscar Usuario Por Cedula" required name="cedulaBuscar"  pattern="[0-9]{7,9}">
                    <input class="btn btn-outline-primary " type="submit" value="Buscar">
                </form>
            </div>



        </div>
        <div class="row justify-content-center my-5">
            <div class="col-7 bg-light  justify-content-center m-3">
                <table class="table table-light text-dark">
                    <thead>
                        <tr class="text-center">
                            <td>Id Usuario</td>
                            <td>Cedula</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Activo(1 para si, 0 para no)</td>
                            <td>Desactivar</td>
                        </tr>
                    </thead>
                    <tbody id="tBodyUsuario">

                    </tbody>
                </table>

            </div>
        </div>

        <script src="../../../assets/jquery-3.3.1.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>

    </div>

</body>

</html>