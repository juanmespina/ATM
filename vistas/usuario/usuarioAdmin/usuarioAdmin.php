<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row row-menu">
            <div class="col-6">
                <button class="btn btn-outline-primary  w-100 h-100 d-block" id="usuario">Usuario</button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="cuenta">Cuenta</button>
            </div>


        </div>
        <div class="row row-menu">
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="transacciones">Transacciones de cuentas</button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="tarjeta">Tarjetas</button>
            </div>
        </div>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>

</body>

</html>