<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row justify-content-center">
            <div class="col-4 d-flex justify-content-center  bg-light border border-primary text-center my-3">
                
                <form id="formCambiarPin" class="mt-3 text-center  justify-content-around">
                <h4>Cambio de Pin</h4>
                    <div class="form-group">
                        <label for="tarjeta">Tarjeta</label>
                        <select id="tarjeta" class="form-control" name="tarjeta" required>
                            <option value="" disabled selected>Seleccione una tarjeta...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pin">Pin</label>
                        <input id="pin" class="form-control" type="text" name="pin" pattern="[0-9]{4}">
                    </div>

                    <input type="submit" class="btn btn-primary float-right mb-2" value="Cambiar Pin">
                </form>
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