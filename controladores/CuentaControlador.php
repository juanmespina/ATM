<?php
require_once '../utilidades/session.php';
require_once '../modelos/Cuenta.php';
require_once '../modelos/Usuario.php';
class CuentaControlador
{
    function cargarCuentaPropia()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Cuenta();
            $arreglo = $objeto->selectCuenta($_SESSION['idusuario']);
            if (count($arreglo) > 0) {
                $_SESSION['cuentas'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No posee cuentas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function crearCuenta()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['cedula']) && isset($_POST['tipoCuenta'])) {
            $objeto = new Cuenta();
            $numeroCta = "0135" . mt_rand(1000000000000000, 9999999999999999);
            if (strlen($numeroCta) == 20) {
                $objetoUsuario = new Usuario();
                $arreglo = $objetoUsuario->selectUsuarioCedula($_POST['cedula']);
                if (count($arreglo) > 0) {
                    if ($objeto->insertarCuenta($arreglo['id'], $numeroCta, $_POST['tipoCuenta'])) {
                        echo 'Cuenta creada para el usuario con el numero ' . $numeroCta;
                    } else {

                        echo 'No se pudo crear la cuenta';
                    }
                } else {
                    echo 'No existe usuario para crear cuenta';
                }
            } else {
                echo 'No se pudo crear un numero de cuenta';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function cargarTipoCuenta()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Cuenta();
            $arreglo = $objeto->selectTipoCuenta();
            if (count($arreglo) > 0) {
                echo json_encode($arreglo);
            } else {

                echo 'Problemas al cargar Tipo de cuentas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function buscarCuentas()
    {
        if (isset($_POST['cedulaBuscarCuentas'])) {
            $objeto = new Cuenta();
            $arreglo = $objeto->selectCuentaCedula($_POST['cedulaBuscarCuentas']);
            if (count($arreglo) > 0 && $arreglo!=false) {
                $_SESSION['cuentasBuscadas'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No tiene cuentas registradas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarCuenta()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['cuentasBuscadas']) && isset($_POST['nroCuenta'])) {
            $objeto = new Cuenta();

            foreach ($_SESSION['cuentasBuscadas'] as $cuenta) {
                if ($cuenta['numero'] == $_POST['nroCuenta']) {

                    if ($objeto->updateCuentaActiva($_POST['nroCuenta'])) {
                        echo true;
                    } else {

                        echo 'No se pudo desactivar la cuenta';
                    }
                }
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
