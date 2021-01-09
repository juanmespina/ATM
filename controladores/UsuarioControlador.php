<?php
require_once '../modelos/Usuario.php';

class UsuarioControlador
{

    function iniciarSesion()
    {
        if (isset($_POST['llave']) && isset($_POST['pin'])) {

            // if (strlen(trim($_POST['llave'])) > 3) {
            //     if (strlen(trim($_POST['pin'])) > 4) {
            $objeto = new Usuario();
            $existe = $objeto->selectUsuarioPorTarjeta($_POST['llave'], $_POST['pin']);
            if (count($existe) > 0) {

                session_start();
                $_SESSION['cedula'] = $existe['cedula'];
                $_SESSION['nombre'] = $existe['nombre'];
                $_SESSION['apellido'] = $existe['apellido'];
                $_SESSION['idusuario'] = $existe['id'];
                $_SESSION['nivel'] = $existe['nivel_usuario_id'];
                echo json_encode($existe);
                //echo "Todo bien";
            } else {
                echo "Usuario o contrasena errado";
            }
            //     } else {
            //         echo 'Recuerda que contrasena debe tener mas de 6 caracteres';
            //     }
            // } else {
            //     echo "Recuerda que usuario debe tener mas de tres letras";
            // }
        } else {

            echo "Error en los parametros enviados";
        }
    }
    function cerrarSesion()
    {
        session_start();
        if (isset($_POST['cedula']) && isset($_POST['idusuario'])) {
            unset($_SESSION);
            unset($_COOKIE);
            session_destroy();
            echo true;
        } else {

            echo "Error al cerrar sesion";
        }
    }
    function crearUsuario()
    {
        if (isset($_POST['apellido']) && isset($_POST['nombre']) && isset($_POST['cedula'])) {
            if (strlen(trim($_POST['nombre'])) > 3 && strlen(trim($_POST['apellido'])) > 2) {
                if (strlen(trim($_POST['cedula'])) >= 7 && strlen(trim($_POST['cedula'])) <= 11) {
                    $objeto = new Usuario();
                    $existe = $objeto->selectUsuarioCedula($_POST['cedula']);
                    if (count($existe) == 0) {
                        $resultado = $objeto->insertUsuario($_POST['nombre'], $_POST['apellido'], $_POST['cedula']);
                        if ($resultado != false) {
                            echo true;
                        } else {

                            echo "Error al guardar los datos";
                        }
                    } else {

                        echo "Ya existe un usuario con la cedula registrada";
                    }
                } else {

                    echo 'Cedula debe tener de 7 a 11 caracteres';
                }
            } else {

                echo "Nombre y apellido no tienen caracteres";
            }
        } else {

            echo "Error en los parametros enviados. ";
        }
    }
    function buscarUsuario()
    {
        session_start();
        if (isset($_SESSION['idusuario']) && isset($_POST['cedula'])) {
            $objeto = new Usuario();
            $arreglo = $objeto->selectUsuarioCedula($_POST['cedula']);
            if (count($arreglo) > 0) {
                $_SESSION['usuarioBuscado'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'Usuario no registrado';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarUsuario()
    {
        session_start();
        if (isset($_SESSION['idusuario']) && isset($_SESSION['usuarioBuscado'])) {
            $objeto = new Usuario();
            if ($objeto->updateUsuarioActivo($_SESSION['usuarioBuscado']['cedula'])) {
                echo true;
            } else {

                echo 'No se pudo desactivar el usuario';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
