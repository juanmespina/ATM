<?php
require_once '../db/Database.php';

class Transaccion
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function insertTransferencia($idCuentaE, $idCuentaR, $monto)
    {
        $this->bd->autocommit(false);
        try {
            $sql1 = "INSERT INTO transaccion(tipo_transaccion_id,cantidad,activo,fecha,cuenta_id)VALUES(1,'-$monto',1,CURDATE(),'$idCuentaE')";
            $this->bd->query($sql1);
            $sql2 = "INSERT INTO transaccion(tipo_transaccion_id,cantidad,activo,fecha,cuenta_id)VALUES(1,'$monto',1,CURDATE(),'$idCuentaR')";
            $this->bd->query($sql2);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }


    function insertDeposito($idCuenta, $monto)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO transaccion(tipo_transaccion_id,cantidad,activo,fecha,cuenta_id)VALUES(3,'$monto',1,CURDATE(),'$idCuenta')";
            $this->bd->query($sql);

            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
    function insertRetiro($idCuenta, $monto)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO transaccion(tipo_transaccion_id,cantidad,activo,fecha,cuenta_id)VALUES(2,-'$monto',1,CURDATE(),'$idCuenta')";
            $this->bd->query($sql);

            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
    function insertTransacServicios($monto, $idCuentaE)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO transaccion(tipo_transaccion_id,cantidad,activo,fecha,cuenta_id)VALUES(4,'-$monto',1,CURDATE(),'$idCuentaE')";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return  $id;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
    function selectUltimasTransacciones($nroCuenta)
    {
        $sql = "SELECT transaccion.id,cuenta.numero,tipo_transaccion.tipo,transaccion.fecha, transaccion.cantidad FROM transaccion INNER JOIN cuenta ON 
        transaccion.cuenta_id= cuenta.id INNER JOIN tipo_transaccion ON transaccion.tipo_transaccion_id=tipo_transaccion.id WHERE 
        cuenta.numero='$nroCuenta' GROUP BY transaccion.id DESC LIMIT 15";
        $resultados = $this->bd->query($sql);

        if (mysqli_num_rows($resultados) == 0) {
            return 0;
        } else {
            while ($row = $resultados->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
    }
}
