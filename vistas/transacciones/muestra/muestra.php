<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row justify-content-center my-5">
            <div class="col-7 bg-light border border-primary justify-content-center m-3">
                <h2>Seleccionar cuenta</h2>

                <form method="post" id="formMostrar" class=" mt-3">
                    <div class="form-row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="cuentas">Tus cuentas</label>
                                <select id="cuentas" class="form-control" name="" required>
                                    <option value="" disabled selected>Seleccione una cuenta...</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <input type="submit" class="btn btn-outline-primary my-2 float-right" value="Mostrar" required>
                </form>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-7 bg-light  justify-content-center m-3">
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
        <script src="../../cuenta/Cuenta.js"></script>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>

</body>

</html>