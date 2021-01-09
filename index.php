<?php
session_start();
if (isset($_SESSION['cedula']) && isset($_SESSION['idusuario']) && isset($_SESSION['nombre'])) {
    header('Location:../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php');
    echo 'Sip';
}
require_once 'vistas/layout/head.php';
require_once 'vistas/layout/navbar.php';
?>

<body>
    <?php require_once 'vistas/layout/navbar.php';
    ?>

    <div class="container-fluid my-5">

        <div class="row justify-content-center my-5">
            <div class="col-3 bg-light border border-primary text-center m-3">
                <h2>Ingresar a la banca</h2>
                <form method="post" id="formIniciarSesion" class=" mt-3">
                    <div class="form-group">
                        <label for="llave">Llave Bancaria</label>
                        <input id="llave" class="form-control" type="text" name="llave" pattern="[0-9]{16}" required>

                    </div>
                    <div class="form-group">
                        <label for="pin">Pin de la tarjeta </label>
                        <input id="pin" class="form-control" type="password" name="pin"  pattern="[0-9]{4}"  required>
                    </div>
                    <input type="submit" class="btn btn-outline-primary my-2" value="Ingresar">
                </form>
            </div>


        </div>

    </div>

    <footer class="footer bg-primary text-white text-center d-block w-100">
        <h5 class="mt-2"><?= date("Y") ?>. Creado por Juan Espina para Programacion Web </h5>
    </footer>
    <script src="vistas/usuario/Usuario.js"></script>
    <script src="vistas/usuario/login/eventos.js"></script>
</body>

</html>