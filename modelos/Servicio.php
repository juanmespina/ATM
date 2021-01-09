<?php
require_once '../db/Database.php';

class Servicio
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }
    function selectServicios()
    {
        $sql = "SELECT * FROM servicio ";
        $resultados = $this->bd->query($sql);
        while ($row = $resultados->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function insertPagoServicio($idServicio, $idTransaccion, $codigo)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO pago_servicio(servicio_id,transaccion_id,codigo)VALUES('$idServicio','$idTransaccion','$codigo')";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
}
