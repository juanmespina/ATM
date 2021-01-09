<?php
require_once '../utilidades/session.php';
require_once '../modelos/Tarjeta.php';
require_once '../modelos/Usuario.php';
class TarjetaControlador
{
    function cargarTarjetaPropia()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Tarjeta();
            $arreglo = $objeto->selectTarjeta($_SESSION['idusuario']);
            if (count($arreglo) > 0) {
                $_SESSION['tarjeta'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No posee tarjetas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function crearTarjeta()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['cedula']) && isset($_POST['pin'])) {

            if (strlen($_POST['pin']) == 4) {
                $objeto = new Tarjeta();
                $numeroTarjeta = "9135" . mt_rand(100000000000, 999999999999);
                if (strlen($numeroTarjeta) == 16) {
                    $objetoUsuario = new Usuario();
                    $arreglo = $objetoUsuario->selectUsuarioCedula($_POST['cedula']);
                    if (count($arreglo) > 0) {
                        if ($objeto->insertarTarjeta($arreglo['id'], $_POST['pin'], $numeroTarjeta)) {
                            echo 'Tarjeta creada para el usuario con el numero ' . $numeroTarjeta;
                        } else {

                            echo 'No se pudo crear la Tarjeta';
                        }
                    } else {
                        echo 'No existe usuario para crear Tarjeta';
                    }
                } else {
                    echo 'No se pudo crear un numero de Tarjeta';
                }
            } else {
                echo ' El pin debe tener 4 digitos';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }

    function buscarTarjetas()
    {
        if (isset($_POST['cedulaBuscarTarjetas'])) {
            $objeto = new Tarjeta();
            $arreglo = $objeto->selectTarjetaCedula($_POST['cedulaBuscarTarjetas']);
            if (count($arreglo) > 0 && $arreglo != false) {
                $_SESSION['tarjetasBuscadas'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No tiene cuentas registradas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarTarjeta()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['tarjetasBuscadas']) && isset($_POST['nroTarjeta'])) {
            $objeto = new Tarjeta();
            foreach ($_SESSION['tarjetasBuscadas'] as $tarjeta) {
                if ($tarjeta['numerotarjeta'] == $_POST['nroTarjeta']) {
                    if ($objeto->updateTarjetaActiva($_POST['nroTarjeta'])) {
                        echo true;
                    } else {
                        echo 'No se pudo desactivar la Tarjeta';
                    }
                }
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function actualizarPin()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['tarjeta']) && isset($_POST['pin'])) {

            if (strlen($_POST['pin']) == 4) {
                $objeto = new Tarjeta();

                if ($objeto->actualizarTarjeta($_POST['tarjeta'], $_POST['pin'])) {
                    echo 'Pin modificado exitosamente';
                } else {
                    echo 'No existe usuario para crear Tarjeta';
                }
            } else {
                echo ' El pin debe tener 4 digitos';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
