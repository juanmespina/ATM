<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row justify-content-center  p-3">
            <div class="col-7 bg-light border border-primary justify-content-centertext-center">
                <h2>Seleccionar cuenta</h2>

                <form class="form-inline my-2" id="formMostrar">
                    <label for="muestra">Numero de cuenta a consultar</label>
                    <input id="muestra" type="text" class="form-control mx-1" name="muestra" placeholder="Buscar por transacciones numero de cuenta" pattern="[0-9]{20}">
                    <input class="btn btn-outline-primary " type="submit" value="Buscar" >
                </form>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-9 bg-light  justify-content-center m-3">
                <table class="table table-light text-dark">
                    <thead>
                        <tr>
                            <td>Referencia</td>
                            <td>Cuenta</td>
                            <td>Tipo</td>
                            <td>Fecha</td>
                            <td>Monto</td>
                        </tr>
                    </thead>
                    <tbody id="tBodyTrans">

                    </tbody>
                </table>

            </div>

        </div>

        <script src="../Transaccion.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>

</body>

</html>