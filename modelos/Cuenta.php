<?php
require_once '../db/Database.php';

class Cuenta
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function selectCuenta($idUsuario)
    {
        $sql = "SELECT cuenta.numero, cuenta.saldo,cuenta.id, tipo_cuenta.tipo FROM cuenta INNER JOIN tipo_cuenta ON 
            cuenta.tipo_cuenta_id=tipo_cuenta.id WHERE cuenta.usuario_id='$idUsuario'";
        $resultados = $this->bd->query($sql);
        while ($row = $resultados->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    function selectCuentaReceptora($cuentaR, $cedulaR)
    {
        $sql = "SELECT cuenta.numero,cuenta.saldo, usuario.cedula,cuenta.id FROM cuenta INNER JOIN usuario ON 
            cuenta.usuario_id=usuario.id WHERE cuenta.numero='$cuentaR' AND usuario.cedula='$cedulaR'";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }

    function updateCuenta($nuevoSaldo, $idCuenta)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "UPDATE cuenta SET cuenta.saldo='$nuevoSaldo' WHERE cuenta.id='$idCuenta'";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return $e;
        }
        // $sql = "UPDATE cuenta SET cuenta.saldo='$nuevoSaldo' WHERE cuenta.id='$idCuenta'";
        // if ($this->bd->query($sql)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
    function insertarCuenta($idUsuario, $numeroCta, $idTipoCuenta)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO cuenta(numero,saldo, tipo_cuenta_id,activo,usuario_id)VALUES ('$numeroCta',0,'$idTipoCuenta',1,'$idUsuario')";
            $resultado = $this->bd->query($sql);
            $this->bd->commit();
            return $resultado;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
    function selectTipoCuenta()
    {

        $sql = "SELECT * FROM tipo_cuenta ";
        $resultados = $this->bd->query($sql);
        while ($row = $resultados->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    function selectCuentaNumero($numero)
    {
        $sql = "SELECT cuenta.id, cuenta.numero,cuenta.saldo,cuenta.activo, tipo_cuenta.tipo,usuario.cedula FROM cuenta INNER JOIN tipo_cuenta
         ON tipo_cuenta.id=cuenta.tipo_cuenta_id INNER JOIN usuario ON cuenta.usuario_id= usuario.id WHERE cuenta.numero= '$numero' 
         AND cuenta.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function selectCuentaCedula($numero)
    {
        $sql = "SELECT cuenta.id, cuenta.numero,cuenta.saldo,cuenta.activo, tipo_cuenta.tipo,usuario.cedula FROM cuenta INNER JOIN tipo_cuenta
         ON tipo_cuenta.id=cuenta.tipo_cuenta_id INNER JOIN usuario ON cuenta.usuario_id= usuario.id WHERE usuario.cedula= '$numero' 
         AND cuenta.activo=1";
        $resultados = $this->bd->query($sql);
        if ($resultados->num_rows > 0) {
            while ($row = $resultados->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }
    function updateCuentaActiva($numeroCta)
    {
        try {
            $sql = "UPDATE cuenta SET cuenta.activo=0 WHERE cuenta.numero='$numeroCta'";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
}
