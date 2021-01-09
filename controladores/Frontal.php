<?php
require_once 'autoload.php';
if (isset($_POST['controlador']) && isset($_POST['accion'])) {
        $controlador = $_POST['controlador'] . "Controlador";
        $objeto = new $controlador();
        $accion = $_POST['accion'];
        $objeto->$accion();
} else {

        echo "No se encontro controlador";
}
