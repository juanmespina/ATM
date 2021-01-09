<?php
require_once '../utilidades/session.php';
require_once '../modelos/Transaccion.php';
require_once '../modelos/Cuenta.php';
require_once '../modelos/Servicio.php';
class TransaccionControlador
{

    function transferir()
    {
        if (isset($_POST['cuentaReceptor']) && isset($_POST['cedulaReceptor']) && isset($_POST['monto'])) {
            $cedulaR = $_POST['cedulaReceptor'];
            $cuentaR = $_POST['cuentaReceptor'];
            $monto = $_POST['monto'];
            $objeto = new Cuenta();
            $existe = $objeto->selectCuentaReceptora($cuentaR, $cedulaR);
            if (count($existe) > 0) {
                for ($i = 0; $i < count($_SESSION['cuentas']); $i++) {
                    if ($_SESSION['cuentas'][$i]['numero'] == $_POST['cuentaPropia']) {
                        if ($monto < $_SESSION['cuentas'][$i]['saldo']) {
                            $objetoTransaccion = new Transaccion();
                            //echo ($_SESSION['cuentas'][$i]['saldo'] - $monto). " "  .$_SESSION['cuentas'][$i]['id']. ' Recibe '. ($existe['saldo'] + $monto). " ".$existe['id']  ;
                            if ($objetoTransaccion->insertTransferencia($_SESSION['cuentas'][$i]['id'], $existe['id'], $monto) == true) {
                                if ($objeto->updateCuenta(($_SESSION['cuentas'][$i]['saldo'] - $monto), $_SESSION['cuentas'][$i]['id']) == true) {
                                    if ($objeto->updateCuenta(($existe['saldo'] + $monto), $existe['id']) == true) {
                                        $recibo['saldoEnvia'] = $_SESSION['cuentas'][$i]['saldo'] - $monto;
                                        $recibo['cuentaE'] = $_SESSION['cuentas'][$i]['numero'];
                                        $recibo['cuentaR'] = $cuentaR;
                                        $recibo['fecha'] = date("Y/m/d");
                                        echo  json_encode($recibo);
                                    } else {
                                        echo 'Error al actualizar datos de la cuenta que recibe';
                                    }
                                } else {

                                    echo 'Error al actualizar datos de la cuenta que envia';
                                }
                            } else {

                                echo 'Error al realizar la transferencia';
                            }
                        } else {

                            echo 'No posee saldo suficiente';
                        }
                    }
                }
            } else {
                echo "El destinatario no esta asociado al banco";
            }
        }
    }

    function depositar()
    {
        if (isset($_POST['monto'])) {

            $monto = $_POST['monto'];
            $objeto = new Cuenta();
            for ($i = 0; $i < count($_SESSION['cuentas']); $i++) {
                if ($_SESSION['cuentas'][$i]['numero'] == $_POST['cuentaPropia']) {

                    $objetoTransaccion = new Transaccion();
                    //echo ($_SESSION['cuentas'][$i]['saldo'] - $monto). " "  .$_SESSION['cuentas'][$i]['id']. ' Recibe '. ($existe['saldo'] + $monto). " ".$existe['id']  ;
                    if ($objetoTransaccion->insertDeposito($_SESSION['cuentas'][$i]['id'], $monto) == true) {
                        if ($objeto->updateCuenta(($_SESSION['cuentas'][$i]['saldo'] + $monto), $_SESSION['cuentas'][$i]['id']) == true) {
                            $recibo['saldoEnvia'] = $_SESSION['cuentas'][$i]['saldo'] + $monto;
                            $recibo['cuentaE'] = $_SESSION['cuentas'][$i]['numero'];
                            $recibo['fecha'] = date("Y/m/d");
                            echo json_encode($recibo);
                        } else {

                            echo ' Error al actualizar datos de la cuenta donde se depositara';
                        }
                    } else {

                        echo 'Error al realizar el deposito';
                    }
                }
            }
        }
    }
    function retirar()
    {
        if (isset($_POST['monto'])) {

            $monto = $_POST['monto'];
            $objeto = new Cuenta();
            for ($i = 0; $i < count($_SESSION['cuentas']); $i++) {
                if ($_SESSION['cuentas'][$i]['numero'] == $_POST['cuentaPropia']) {
                    if ($monto < $_SESSION['cuentas'][$i]['saldo']) {
                        $objetoTransaccion = new Transaccion();
                        //echo ($_SESSION['cuentas'][$i]['saldo'] - $monto). " "  .$_SESSION['cuentas'][$i]['id']. ' Recibe '. ($existe['saldo'] + $monto). " ".$existe['id']  ;
                        if ($objetoTransaccion->insertRetiro($_SESSION['cuentas'][$i]['id'], $monto) == true) {
                            if ($objeto->updateCuenta(($_SESSION['cuentas'][$i]['saldo'] - $monto), $_SESSION['cuentas'][$i]['id']) == true) {
                                $recibo['saldoEnvia'] = $_SESSION['cuentas'][$i]['saldo'] - $monto;
                                $recibo['cuentaE'] = $_SESSION['cuentas'][$i]['numero'];
                                $recibo['fecha'] = date("Y/m/d");
                                echo json_encode($recibo);
                            } else {

                                echo ' Error al actualizar datos de la cuenta de donde se retirara dinero';
                            }
                        } else {

                            echo 'Error al realizar el retiro';
                        }
                    } else {

                        echo 'No posee saldo suficiente para realizar el retiro de dinero';
                    }
                }
            }
        }
    }
    function pagarServicio()
    {
        if (isset($_POST['idservicio']) && isset($_POST['cuentaPropia']) && isset($_POST['monto']) && isset($_POST['codigo'])) {
            $codigo = $_POST['codigo'];
            $idServicio = $_POST['idservicio'];
            $monto = $_POST['monto'];
            $objeto = new Cuenta();

            // if (in_array($idServicio, $_SESSION['servicios'])) {
            for ($i = 0; $i < count($_SESSION['cuentas']); $i++) {
                if ($_SESSION['cuentas'][$i]['numero'] == $_POST['cuentaPropia']) {
                    if ($monto < $_SESSION['cuentas'][$i]['saldo']) {
                        $objetoTransaccion = new Transaccion();
                        $idUltimoTransaServ = $objetoTransaccion->insertTransacServicios($monto, $_SESSION['cuentas'][$i]['id']);
                        //echo $idUltimoTransaServ;
                        if ($idUltimoTransaServ != false) {
                            $objetoServicio = new Servicio();
                            if ($objetoServicio->insertPagoServicio($idServicio, $idUltimoTransaServ, $codigo) == true) {
                                if ($objeto->updateCuenta(($_SESSION['cuentas'][$i]['saldo'] - $monto), $_SESSION['cuentas'][$i]['id']) == true) {
                                    $recibo['saldoEnvia'] = $_SESSION['cuentas'][$i]['saldo'] - $monto;
                                    $recibo['cuentaE'] = $_SESSION['cuentas'][$i]['numero'];
                                    $recibo['fecha'] = date("Y/m/d");
                                    $recibo['monto'] = $monto;

                                    echo  json_encode($recibo);
                                } else {

                                    echo ' Error al actualizar datos de la cuenta que envia';
                                }
                            }
                        } else {

                            echo 'Error al realizar el pago';
                        }
                    } else {

                        echo 'No posee saldo suficiente';
                    }
                }
            }
            // } else {
            //     echo "Moviste algo?";
            // }
        }
    }
    function mostrarTransacciones()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['cuentaPropia'])) {
            for ($i = 0; $i < count($_SESSION['cuentas']); $i++) {
                if ($_SESSION['cuentas'][$i]['numero'] == $_POST['cuentaPropia']) {
                    $objeto = new Transaccion();
                    $arreglo = $objeto->selectUltimasTransacciones($_POST['cuentaPropia']);
                    if (count($arreglo) > 0) {
                        echo json_encode($arreglo);
                    } else {

                        echo 'Problemas al cargar sus transacciones';
                    }
                }
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function mostrarTransaccionesAdmin()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['numeroCuenta'])) {
            $objeto = new Transaccion();
            $arreglo = $objeto->selectUltimasTransacciones($_POST['numeroCuenta']);
            if (count($arreglo) > 0 ||$arreglo!=0) {
                echo json_encode($arreglo);
            } else {

                echo 'No tiene transacciones';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
