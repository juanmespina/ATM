<?php require_once '../../../utilidades/session.php';

require_once '../../layout/head.php';

?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row row-menu">
            <div class="col-6">
                <button class="btn btn-outline-primary  w-100 h-100 d-block" id="mostrar">Mostrar ultimas transacciones</button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="transferencia">Transferencias</button>
            </div>


        </div>
        <div class="row row-menu">
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="servicios">Pago de Servicios</button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="pin">Cambio de Pin</button>
            </div>
        </div>
        <div class="row row-menu">
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="retiro">Retiro</button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary w-100 h-100 d-block" id="deposito">Depósito</button>
            </div>
        </div>
        <script src="eventos.js"></script>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>

</body>

</html>