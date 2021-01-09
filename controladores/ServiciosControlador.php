<?php
require_once '../utilidades/session.php';
require_once '../modelos/Servicio.php';
class ServiciosControlador
{
    function cargarServicios()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Servicio();
            $arreglo = $objeto->selectServicios();
            if (count($arreglo) > 0) {

                $_SESSION['servicios'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'Problemas al cargar servicios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
