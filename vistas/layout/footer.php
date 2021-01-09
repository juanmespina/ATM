<footer class="footer w-100 ">
    <div class="row justify-content-around bg-primary">


        <div class="col-3 justify-content-around my-2" id="btnMenuPrincipal">
            <?php if ($_SESSION['nivel'] == 2) { ?>
                <a class=" btn btn-block btn-outline-primary border border-light text-white " href="../../../vistas/usuario/usuarioPrincipal/usuarioPrincipal.php"> Volver al menu principal</a>
            <?php } else { ?>
                <a class=" btn btn-block btn-outline-primary border border-light text-white " href="../../../vistas/usuario/usuarioAdmin/usuarioAdmin.php"> Volver al menu principal</a>
            <?php
            } ?>

        </div>
        <div class="col-3 justify-content-around my-2">
            <a class=" btn btn-block btn-outline-primary border border-light text-white " id="btnCerrarSesion" href="#"> Cerrar Sesion</a>
        </div>
    </div>

</footer>
<script src="../../../vistas/usuario/Usuario.js"></script>
<script src="../../../vistas/layout/footerEventos.js"></script>